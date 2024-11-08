<?php

namespace Sistema42\Services;

use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class CartService {
    use SimpleRequest;

    const URL = '/api/v2/me/cart';

    public function index() : string
    {
        $url = Config::getUrl() . self::URL;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function show(int $id) : string
    {
        $url = Config::getUrl() . self::URL . '/' . $id;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function create(array $data) : string
    {
        $body = [ 'body' => [
            'service' => $data['service'],
            'agency' => $data['agency'] ?? '',
            'from' => $data['from'],
            'to' => $data['to'],
            'products' => $data['products'],
            'volumes' => $data['volumes'],
            'options' => $data['options'],
        ]];

        $url = Config::getUrl() . self::URL;
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function destroy(int $id) : string
    {
        $url = Config::getUrl() . self::URL . '/' . $id;
        $headers = Config::getPostHeader();

        return $this->_delete($url, $headers);
    }
}