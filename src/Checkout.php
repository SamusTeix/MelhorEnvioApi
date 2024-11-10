<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\CheckoutService;
use Sistema42\MelhorEnvioApi\Traits\CreateTrait;

class Checkout {
    use CreateTrait;

    private $service;
    public function __construct() {
        $this->service = new CheckoutService();
    }
}