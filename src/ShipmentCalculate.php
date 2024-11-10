<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\ShipmentCalculateService;

class ShipmentCalculate {
    private $service;
    public function __construct() {
        $this->service = new ShipmentCalculateService();
    }

    public function get(array $data) : string
    {
        return $this->service->get($data);
    }
}