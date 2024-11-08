<?php

namespace Sistema42\Controllers;

use Sistema42\Services\AgenciesService;
use Sistema42\Traits\IndexTrait;
use Sistema42\Traits\ShowTrait;

class AgenciesController {
    use IndexTrait, ShowTrait;

    public function __construct(private readonly AgenciesService $service) {}
}