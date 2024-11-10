<?php

namespace Sistema42\MelhorEnvioApi\Traits;

trait ShowTrait {
    public function show(mixed $id) : string
    {
        return $this->service->show($id);
    }
}