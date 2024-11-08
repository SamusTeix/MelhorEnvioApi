<?php

namespace Sistema42\Controllers;

use Sistema42\Services\ShipmentCalculateService;

class ShipmentCalculateController {
    public function __construct(private readonly ShipmentCalculateService $service) {}

    public function get(array $data) : string
    {
        return $this->service->get($data);
    }
}