<?php

namespace Sistema42\Traits;

trait DestroyTrait {
    public function destroy(mixed $data) : string
    {
        return $this->service->destroy($data);
    }
}