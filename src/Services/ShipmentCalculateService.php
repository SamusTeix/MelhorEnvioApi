<?php

namespace Sistema42\Services;

use DomainException;
use Sistema42\Helpers\Config;
use Sistema42\Traits\SimpleRequest;

final class ShipmentCalculateService {
    use SimpleRequest;

    const URL = '/api/v2/me/shipment/calculate';

    private string $url;
    private array $headers;

    public function get(array $data) : string
    {
        $this->url = Config::getUrl() . self::URL;
        $this->headers = Config::getPostHeader();

        if (! empty($data['products'])) {
            return $this->getByProduct($data);
        }

        if (! empty($data['package'])) {
            return $this->getByPackage($data);
        }

        throw new DomainException(self::class . ' ERROR: Not found "products" or "package" configuration');
    }

    private function getByProduct($data) : string
    {
        $data = [
            'body' => [
                'from' => ['postal_code' => $data['from']],
                'to' => ['postal_code' => $data['to']],
                'products' => $data['products'],
                'options' => $data['options'] ?? [],
                'services' => $data['services'] ?? '',
            ],
        ];

        return $this->_post($this->url, $this->headers, $data);
    }

    private function getByPackage($data) : string
    {
        $data = [
            'body' => [
                'from' => ['postal_code' => $data['from']],
                'to' => ['postal_code' => $data['to']],
                'package' => $data['package'],
                'options' => $data['options'] ?? [],
                'services' => $data['services'] ?? '',
            ],
        ];

        return $this->_post($this->url, $this->headers, $data);
    }
}