<?php

namespace Sistema42\MelhorEnvioApi\Services;

use Sistema42\MelhorEnvioApi\Helpers\Config;
use Sistema42\MelhorEnvioApi\Traits\SimpleRequest;

final class CheckoutService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/checkout';

    public function create(array $data) : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getPostHeader();

        $body = [
            'orders' => $data['orders'],
        ];

        return $this->_post($url, $headers, $body);
    }
}