<?php

namespace Sistema42\Controllers;

use Sistema42\Services\LabelService;
use Sistema42\Traits\CreateTrait;
use Sistema42\Traits\DestroyTrait;
use Sistema42\Traits\IndexTrait;
use Sistema42\Traits\ShowTrait;

class LabelController {
    use IndexTrait, ShowTrait, CreateTrait, DestroyTrait;

    public function __construct(private readonly LabelService $service) {}

    public function search(?array $data) : string
    {
        return $this->service->search($data);
    }

    public function cancellable(?array $data) : string
    {
        return $this->service->cancellable($data);
    }

    public function preview(?array $data) : string
    {
        return $this->service->preview($data);
    }

    public function print(?array $data) : string
    {
        return $this->service->print($data);
    }

    public function tracking(?array $data) : string
    {
        return $this->service->tracking($data);
    }
}