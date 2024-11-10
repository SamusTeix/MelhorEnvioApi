<?php

namespace Sistema42\MelhorEnvioApi\Traits;

trait IndexTrait {
    public function index(mixed $queryParams = null) : string
    {
        return $this->service->index($queryParams ?? null);
    }
}