<?php

namespace Sistema42\Controllers;

use Sistema42\Services\CartService;
use Sistema42\Traits\CreateTrait;
use Sistema42\Traits\DestroyTrait;
use Sistema42\Traits\IndexTrait;
use Sistema42\Traits\ShowTrait;

class CartController {
    use IndexTrait, ShowTrait, CreateTrait, DestroyTrait;

    public function __construct(private readonly CartService $service) {}
}