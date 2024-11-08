<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class CheckoutService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/checkout';

    public function create(array $data) : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getPostHeader();

        $body = [ 'body' => [
            'orders' => $data['orders'],
        ]];

        return $this->_post($url, $headers, $body);
    }
}