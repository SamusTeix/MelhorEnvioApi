<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class CarriersService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/companies';

    public function index() : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function show(int $id) : string
    {
        $url = Config::getUrl() . self::URL . '/' . $id;
        $headers = Config::getUserAgentHeader();

        return $this->_get($url, $headers);
    }
}