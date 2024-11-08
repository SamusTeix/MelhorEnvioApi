<?php

namespace Sistema42\Helpers;

abstract class Config {
    static $url;
    static $email;
    static $token;
    static $clientId;
    static $clientSecret;
    static $redirectUrl;
    static $refreshToken;

    public static function getUrl() : string
    {
        if (! empty(self::$url)) {
            return self::$url;
        }

        $devUrl = getenv('MELHOR_ENVIO_URL_SANDBOX') ?? 'sandbox.melhorenvio.com.br';
        $prodUrl = getenv('MELHOR_ENVIO_URL_PROD') ?? 'melhorenvio.com.br';

        self::$url = getenv('ENV') === 'prod' ? $prodUrl : $devUrl;

        return self::$url;
    }

    public static function getEmail() : string
    {
        if (! empty(self::$email)) {
            return self::$email;
        }

        self::$email = getenv('MELHOR_ENVIO_EMAIL');

        return self::$email;
    }

    public static function getToken() : string
    {
        if (! empty(self::$token)) {
            return self::$token;
        }

        self::$token = getenv('MELHOR_ENVIO_TOKEN');

        return self::$token;
    }

    public static function getClientId() : string
    {
        if (! empty(self::$clientId)) {
            return self::$clientId;
        }

        self::$clientId = getenv('MELHOR_ENVIO_CLIENT_ID');

        return self::$clientId;
    }

    public static function getClientSecret() : string
    {
        if (! empty(self::$clientSecret)) {
            return self::$clientSecret;
        }

        self::$clientSecret = getenv('MELHOR_ENVIO_CLIENT_SECRET');

        return self::$clientSecret;
    }

    public static function getRedirectUrl() : string
    {
        if (! empty(self::$redirectUrl)) {
            return self::$redirectUrl;
        }

        self::$redirectUrl = getenv('MELHOR_ENVIO_REDIRECT_URL');

        return self::$redirectUrl;
    }

    public static function getRefreshToken() : string
    {
        if (! empty(self::$refreshToken)) {
            return self::$refreshToken;
        }

        self::$refreshToken = getenv('MELHOR_ENVIO_REFRESH_TOKEN');

        return self::$refreshToken;
    }

    public static function getUserAgentHeader() : array
    {
        return [
            'headers' => [
                'User-Agent' => 'Aplicação ' . self::getEmail(),
            ],
        ];
    }

    public static function getAcceptAuthUserAgentHeader() : array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . self::getToken(),
                'User-Agent' => 'Aplicação ' . self::getEmail(),
            ],
        ];
    }

    public static function getAcceptContentTypeUserAgentHeader() : array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Aplicação ' . self::getEmail(),
            ],
        ];
    }

    public static function getPostHeader() : array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . self::getToken(),
                'User-Agent' => 'Aplicação ' . self::getEmail(),
            ],
        ];
    }
}