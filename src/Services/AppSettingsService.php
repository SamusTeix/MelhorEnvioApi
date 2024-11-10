<?php

namespace Sistema42\MelhorEnvioApi\Services;

use Sistema42\MelhorEnvioApi\Helpers\Config;
use Sistema42\MelhorEnvioApi\Traits\SimpleRequest;

final class AppSettingsService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/app-settings';

    public function index() : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }
}