<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class AgenciesService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/agencies';

    public function index(?array $queryParams = []) : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getUserAgentHeader();

        $params = [];
        if (! empty($queryParams['company'])) {
            $params['company'] = $queryParams['company'];
        }
        if (! empty($queryParams['country'])) {
            $params['country'] = $queryParams['country'];
        }
        if (! empty($queryParams['state'])) {
            $params['state'] = $queryParams['state'];
        }
        if (! empty($queryParams['city'])) {
            $params['city'] = urlencode($queryParams['city']);
        }

        return $this->_get($url, $headers, $params);
    }

    public function show(int $id) : string
    {
        $url = Config::getUrl() . self::URL . '/' . $id;
        $headers = Config::getUserAgentHeader();

        return $this->_get($url, $headers);
    }
}