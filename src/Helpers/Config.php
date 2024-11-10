<?php

namespace Sistema42\MelhorEnvioApi\Helpers;

use Sistema42\MelhorEnvioApi\AppSettings;

abstract class Config {  
    private static $url;
    private static $envValues;

    private static $config = [
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

    public static function config(array $values) : mixed
    {
        self::setEnvValues($values);

        if (
            empty(self::$envValues['ENV']) || 
            empty(self::$envValues['MELHOR_ENVIO_URL_PROD']) || 
            empty(self::$envValues['MELHOR_ENVIO_URL_SANDBOX'])
        ) {
            return ['error' => true, 'message' => 'Configs "ENV", "MELHOR_ENVIO_URL_PROD" and "MELHOR_ENVIO_URL_SANDBOX" are required'];
        }

        if (         
            ! empty(self::$envValues['MELHOR_ENVIO_EMAIL']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_TOKEN'])
        ) {
            $isConfigured = self::verifyConnection();
            if ($isConfigured === true) {
                return ['success' => true];
            }

            return ['error' => true, 'message' => $isConfigured];
        }

        if (
            ! empty(self::$envValues['MELHOR_ENVIO_EMAIL']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_CLIENT_ID']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_CLIENT_SECRET']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_REDIRECT_URL'])
        ) {
            return ['success' => 'partial', 'message' => 'Ready to get Bearer Token'];
        }

        if (
            ! empty(self::$envValues['MELHOR_ENVIO_EMAIL']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_CLIENT_ID']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_CLIENT_SECRET']) && 
            ! empty(self::$envValues['MELHOR_ENVIO_REFRESH_TOKEN'])
        ) {
            return ['success' => 'partial', 'message' => 'Ready to refresh Bearer Token'];
        }
    }

    private static function verifyConnection() : bool
    {
        $appSettins = new AppSettings();
        $conn = $appSettins->index();

        if ($conn['error']) {
            return $conn['error'];
        }

        return true;
    }

    private static function setEnvValues(array $values) : void
    {
        if (empty(self::$envValues)) {
            foreach($values as $key => $value) {
                if (in_array($key, self::$config)) {
                    self::$envValues[$key] = $value;
                }
            }
        }
    }

    private static function getEnvValue($fieldVar) : mixed
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