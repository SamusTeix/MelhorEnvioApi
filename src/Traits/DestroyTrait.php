<?php

namespace Sistema42\MelhorEnvioApi\Traits;

trait DestroyTrait {
    public function destroy(mixed $data) : string
    {
        return $this->service->destroy($data);
    }
}