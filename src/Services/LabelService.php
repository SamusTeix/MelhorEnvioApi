<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class LabelService {
    use SimpleRequest;

    const URL_ORDERS = '/api/v2/me/orders';
    const URL_SHIPMENT = '/api/v2/me/shipment';

    public function index(?string $status = '') : string
    {
        $queryParams = [
            'status' => $status,
        ];

        $url = Config::getUrl() . self::URL_ORDERS;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers, $$queryParams);
    }

    public function show(int $id) : string
    {
        $url = Config::getUrl() . self::URL_ORDERS . '/' . $id;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function create(array $data) : string
    {
        $body = [ 'body' => [
            'orders' => $data,
        ]];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/generate';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function destroy(array $data) : string
    {
        $body = [ 'body' => [
            'id' => $data['id'],
            'reason_id' => '2',
            'description' => $data['description'],
        ]];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/cancel';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function search(?array $data) : string
    {
        $queryParams = [];
        if (! empty($data['q'])) {
            $queryParams['q'] = $data['q'];
        }

        if (! empty($data['status'])) {
            $queryParams['status'] = $data['status'];
        }

        $url = Config::getUrl() . self::URL_ORDERS . '/search';
        $headers = Config::getPostHeader();

        return $this->_get($url, $headers, $queryParams);
    }

    public function cancellable(array $data) : string
    {
        $body = [
            'body' => [
                'orders' => $data,
            ],
        ];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/cancellable';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function preview(array $data) : string
    {
        $body = [
            'body' => [
                'orders' => $data['orders'],
            ],
        ];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/preview';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function print(array $data) : string
    {
        $body = [
            'body' => [
                'mode' => $data['mode'] ?? '',
                'orders' => $data['orders'],
            ],
        ];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/print';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function tracking(array $data) : string
    {
        $body = [
            'body' => [
                'orders' => $data['orders'],
            ],
        ];

        $url = Config::getUrl() . self::URL_SHIPMENT . '/tracking';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }
}