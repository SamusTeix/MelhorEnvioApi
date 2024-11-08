<?php

namespace Sistema42\Traits;

trait IndexTrait {
    public function index(mixed $queryParams) : string
    {
        return $this->service->index($queryParams ?? null);
    }
}