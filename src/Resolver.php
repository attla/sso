<?php

namespace Attla\SSO;

use Illuminate\Http\Request;
use Attla\SSO\Models\ClientProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class Resolver extends \Attla\Encrypter
{
    /**
     * Detect the provider from request
     *
     * @return array
     */
    public static function resolveClientProvider(Request $request)
    {
        $host = static::host($request->header('referer'));

        if ($host and $clientProvider = ClientProvider::where('host', $host)->first()) {
            return [
                $host,
                $clientProvider->secret,
                static::token([
                    'secret' => $clientProvider->secret,
                    'host' => $host,
                ]),
            ];
        }

        return [
            null,
            null,
            null,
        ];
    }

    /**
     * Resolve callback url
     *
     * @param array $token
     * @param Authenticatable $user
     * @return string
     */
    public static function callback($token, Authenticatable $user)
    {
        $token = static::jwtDecode($token);

        if (
            !$token
            || empty($token->host)
            || empty($token->secret)
        ) {
            return false;
        }

        return $token->host . '/' . static::userToken($user, $token->secret);
    }

    /**
     * Create a sso sign token
     *
     * @param array $credentials
     * @return string
     */
    protected static function token(array $credentials)
    {
        return static::sign($credentials, 7200);
    }

    /**
     * Create a sso user token
     *
     * @param Authenticatable $user
     * @param string $clientSecret
     * @return string
     */
    protected static function userToken(Authenticatable $user, string $clientSecret)
    {
        $key = static::generateKey(5);

        $payload = static::encode($user, $key);
        $header = static::encode([
            'k' => $key,
        ], $clientSecret);

        return $header . '_' . $payload . '_' . static::md5($header . $payload);
    }

    /**
     * Format a referer host
     *
     * @param string $host
     * @return string
     */
    protected static function host($host)
    {
        $parseUrl = parse_url($host);
        $host = '';

        !empty($parseUrl['scheme']) && $host .= $parseUrl['scheme'] . '://';
        !empty($parseUrl['host']) && $host .= $parseUrl['host'];

        return $host;
    }
}
