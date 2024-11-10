<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\AppSettingsService;
use Sistema42\MelhorEnvioApi\Traits\IndexTrait;

class AppSettings {
    use IndexTrait;

    private $service;
    public function __construct() {
        $this->service = new AppSettingsService();
    }
}