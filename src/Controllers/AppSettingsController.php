<?php

namespace Sistema42\Controllers;

use Sistema42\Services\AppSettingsService;
use Sistema42\Traits\IndexTrait;

class AppSettingsController {
    use IndexTrait;

    public function __construct(private readonly AppSettingsService $service) {}
}