<?php

namespace Sistema42\MelhorEnvioApi\Traits;

trait CreateTrait {
    public function create(array $data = []) : string
    {
        return $this->service->create($data);
    }
}