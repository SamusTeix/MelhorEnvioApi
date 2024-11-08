<?php

namespace Sistema42\Controllers;

use Sistema42\Services\TokenService;

class TokenController {
    public function __construct(private readonly TokenService $service) {}

    public function get(mixed $code) : string
    {
        return $this->service->get($code);
    }

    public function refresh() : string
    {
        return $this->service->refresh();
    }
}