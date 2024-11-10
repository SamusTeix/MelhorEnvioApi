<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\TokenService;

class Token {
    private $service;
    public function __construct() {
        $this->service = new TokenService();
    }

    public function get(mixed $code) : string
    {
        return $this->service->get($code);
    }

    public function refresh() : string
    {
        return $this->service->refresh();
    }
}