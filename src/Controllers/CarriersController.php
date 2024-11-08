<?php

namespace Sistema42\Controllers;

use Sistema42\Services\CarriersService;
use Sistema42\Traits\IndexTrait;
use Sistema42\Traits\ShowTrait;

class CarriersController {
    use IndexTrait, ShowTrait;

    public function __construct(private readonly CarriersService $service) {}
}