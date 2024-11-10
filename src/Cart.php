<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\CartService;
use Sistema42\MelhorEnvioApi\Traits\CreateTrait;
use Sistema42\MelhorEnvioApi\Traits\DestroyTrait;
use Sistema42\MelhorEnvioApi\Traits\IndexTrait;
use Sistema42\MelhorEnvioApi\Traits\ShowTrait;

class Cart {
    use IndexTrait, ShowTrait, CreateTrait, DestroyTrait;

    private $service;
    public function __construct() {
        $this->service = new CartService();
    }
}