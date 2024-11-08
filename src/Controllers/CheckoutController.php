<?php

namespace Sistema42\Controllers;

use Sistema42\Services\CheckoutService;
use Sistema42\Traits\CreateTrait;

class CheckoutController {
    use CreateTrait;

    public function __construct(private readonly CheckoutService $service) {}
}