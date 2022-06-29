<?php

namespace Attla\SSO;

use Attla\Jwt;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Attla\SSO\Models\ClientProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class Resolver extends \Attla\Encrypter
{
    /**
     * Detect the provider from request
     *
     * @return ClientProvider|false
     */
    public static function resolveClientProvider(Request $request)
    {
        $clientHost = static::host($request->client ?: $request->header('referer'));

        if (
            $clientHost
            and $clientHost != $_SERVER['HTTP_HOST']
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
     * @return string|false
     */
    public static function getClientProviderToken(Request $request)
    {
        $clientProvider = static::resolveClientProvider($request);

        if ($clientProvider) {
            return Jwt::payload([
                'secret' => $clientProvider->secret,
                'callback' => $clientProvider->callback,
            ])->sign(120);
        }

        return null;
    }

    /**
     * Resolve callback url
     *
     * @param string $token
     * @param Authenticatable $user
     * @return string
     */
    public static function callback($token, Authenticatable $user, string $redirect = '')
    {
        $token = Jwt::decode($token);

        if (
            !$token
            || empty($token->callback)
            || empty($token->secret)
        ) {
            return false;
        }

        return rtrim($token->callback, '/')
            . '?token=' . Jwt::secret($token->secret)
                ->id($user->toArray())
            . '&redirect=' . $redirect;
    }
}
