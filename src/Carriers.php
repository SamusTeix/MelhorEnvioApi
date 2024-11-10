<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\CarriersService;
use Sistema42\MelhorEnvioApi\Traits\IndexTrait;
use Sistema42\MelhorEnvioApi\Traits\ShowTrait;

class Carriers {
    use IndexTrait, ShowTrait;

    private $service;
    public function __construct() {
        $this->service = new CarriersService();
    }
}