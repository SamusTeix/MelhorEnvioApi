<?php

namespace Sistema42\Controllers;

use Sistema42\Services\ServicesService;
use Sistema42\Traits\IndexTrait;
use Sistema42\Traits\ShowTrait;

class ServicesController {
    use IndexTrait, ShowTrait;

    public function __construct(private readonly ServicesService $service) {}
}