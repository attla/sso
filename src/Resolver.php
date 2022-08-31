<?php

namespace Attla\SSO;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Attla\Support\Arr as AttlaArr;
use Attla\SSO\Models\ClientProvider;
use Illuminate\Support\Facades\Route;
use Attla\DataToken\Facade as DataToken;
use Illuminate\Contracts\Auth\Authenticatable;

class Resolver
{
    /**
     * Store the config instance
     *
     * @var \Illuminate\Config\Repository
     */
    protected static $config;

    /**
     * Detect the provider from request
     *
     * @param \Illuminate\Http\Request $request
     * @return ClientProvider|false
     */
    public static function resolveClientProvider(Request $request)
    {
        $clientHost = static::getClientFromRequest($request);

        if (
            $clientHost
            and $clientProvider = ClientProvider::where('host', $clientHost)->first()
        ) {
            return $clientProvider;
        }

        return false;
    }

    /**
     * Format a referer host
     *
     * @param string $url
     * @return string
     */
    public static function host($url)
    {
        if (!$url) {
            return null;
        }

        $url = (string) $url;
        if (!Str::startsWith($url, 'http')) {
            $url = 'http://' . $url;
        }

        $port = parse_url($url, PHP_URL_PORT);

        return parse_url($url, PHP_URL_HOST) . ($port ? ':' . $port : '');
    }

    /**
     * Get client provider token
     *
     * @param \Illuminate\Http\Request $request
     * @return string|false
     */
    public static function getClientProviderToken(Request $request)
    {
        $clientProvider = static::resolveClientProvider($request);

        if ($clientProvider) {
            return DataToken::payload([
                'host'      => $clientProvider->host,
                'secret'    => $clientProvider->secret,
                'callback'  => $clientProvider->callback,
            ])->sign(120)
            ->encode();
        }

        return null;
    }

    /**
     * Resolve callback url
     *
     * @param string $state
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return string
     */
    public static function callback($state, Authenticatable $user, string $redirect = '')
    {
        $state = DataToken::decode($state);

        if (
            !$state
            || empty($state->callback)
            || empty($state->secret)
        ) {
            return static::redirect();
        }

        return rtrim($state->callback, '/')
            . '?state=' . DataToken::secret($state->secret)
                ->iss($state->host)
                ->bwr()
                ->ip()
                ->id(AttlaArr::toArray($user))
            . '&redirect=' . $redirect;
    }

    /**
     * Get SSO end redirect uri
     *
     * @param string $redirect
     * @return string
     */
    public static function redirect($redirect = null)
    {
        $redirect = trim(trim((string) $redirect), '/');
        !$redirect && $redirect = (string) static::getConfig('sso.redirect', '/');

        return Route::has($route = trim(trim($redirect), '/.-'))
            ? route($route)
            : $redirect;
    }

    /**
     * Detect client_id from request
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public static function getClientFromRequest(Request $request)
    {
        $client = static::host(
            $request->client_id
            ?: $request->client
            ?: $request->header('referer')
        );

        $client == $_SERVER['HTTP_HOST'] && $client = null;

        return $client;
    }

    /**
     * Detect redirect from request
     *
     * @param \Illuminate\Http\Request $request
     * @param string $default
     * @return string
     */
    public static function getRedirectFromRequest(Request $request, $default = null)
    {
        return $request->redirect
            ?: $request->r
            ?: $request->redirect_to
            ?: $request->redirect_uri
            ?: $request->redirect_url
            ?: $request->uri
            ?: $request->url
            ?: static::redirect($default);
    }

    /**
     * Detect scope from request
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public static function getScopeFromRequest(Request $request)
    {
        return $request->scope
            ?: $request->scopes
            ?: $request->profile
            ?: 'default';
    }

    /**
     * Detect state from request
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public static function getStateFromRequest(Request $request)
    {
        return $request->state
            ?: $request->token
            ?: Resolver::getClientProviderToken($request)
            ?: null;
    }

    /**
     * Retrieve config value
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getConfig($key = null, $default = null)
    {
        if (is_null(static::$config)) {
            static::$config = config();
        }

        return static::$config->get($key, $default);
    }
}
