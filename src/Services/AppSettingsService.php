<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

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