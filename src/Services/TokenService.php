<?php

namespace Sistema42\MelhorEnvioApi\Services;

use Sistema42\MelhorEnvioApi\Helpers\Config;
use Sistema42\MelhorEnvioApi\Traits\SimpleRequest;

final class TokenService {
    use SimpleRequest;

    const URL = '/oauth/token';

    public function get($code) : string
    {
        $body = [
            'grant_type' => 'authorization_code',
            'client_id' => Config::getClientId(),
            'client_secret' => Config::getClientSecret(),
            'redirect_uri' => Config::getRedirectUrl(),
            'code' => $code
        ];        

        $url = Config::getUrl() . self::URL;
        $headers = Config::getAcceptContentTypeUserAgentHeader();

        return $this->_post($url, $headers, $body);
    }

    public function refresh() : string
    {
        $body = [
            'grant_type' => 'refresh_token',
            'client_id' => Config::getClientId(),
            'client_secret' => Config::getClientSecret(),
            'refresh_token' => Config::getRefreshToken(),
        ];

        $url = Config::getUrl() . self::URL;
        $headers = Config::getAcceptContentTypeUserAgentHeader();

        return $this->_post($url, $headers, $body);
    }
}