<?php

namespace Sistema42\MelhorEnvioApi\Helpers;

abstract class Config {
    static $url;
    static $envValues;

    const ENV_VARIABLES = [
        'ENV',
        'MELHOR_ENVIO_URL_PROD',
        'MELHOR_ENVIO_URL_SANDBOX',
        'MELHOR_ENVIO_EMAIL',
        'MELHOR_ENVIO_TOKEN',
        'MELHOR_ENVIO_CLIENT_ID',
        'MELHOR_ENVIO_CLIENT_SECRET',
        'MELHOR_ENVIO_REDIRECT_URL',
        'MELHOR_ENVIO_REFRESH_TOKEN',
    ];

    public static function setEnvValues() : void
    {
        if (empty(self::$envValues)) {
            foreach(self::ENV_VARIABLES as $fieldVar) {
                // by getenv() function
                if (! empty(getenv($fieldVar))) {
                    self::$envValues[$fieldVar] = getenv($fieldVar);
                    continue;
                }

                // by ENV() function
                if (! empty(ENV($fieldVar))) {
                    self::$envValues[$fieldVar] = ENV($fieldVar);
                    continue;
                }
            }
        }
    }

    public static function getEnvValue($fieldVar) : mixed
    {
        return empty(self::$envValues[$fieldVar]) ? false : self::$envValues[$fieldVar];
    }

    public static function getUrl() : string
    {
        if (! empty(self::$url)) {
            return self::$url;
        }

        self::$url = self::getEnvValue('ENV') === 'prod' ? self::getEnvValue('MELHOR_ENVIO_URL_PROD') : self::getEnvValue('MELHOR_ENVIO_URL_SANDBOX');

        return self::$url;
    }

    public static function getEmail() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_EMAIL');
    }

    public static function getToken() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_TOKEN');
    }

    public static function getClientId() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_CLIENT_ID');
    }

    public static function getClientSecret() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_CLIENT_SECRET');
    }

    public static function getRedirectUrl() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_REDIRECT_URL');
    }

    public static function getRefreshToken() : string
    {
        return self::getEnvValue('MELHOR_ENVIO_REFRESH_TOKEN');
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