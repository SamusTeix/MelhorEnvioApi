<?php

namespace Sistema42\MelhorEnvioApi;

use Sistema42\MelhorEnvioApi\Services\LabelService;
use Sistema42\MelhorEnvioApi\Traits\CreateTrait;
use Sistema42\MelhorEnvioApi\Traits\DestroyTrait;
use Sistema42\MelhorEnvioApi\Traits\IndexTrait;
use Sistema42\MelhorEnvioApi\Traits\ShowTrait;

class Label {
    use IndexTrait, ShowTrait, CreateTrait, DestroyTrait;

    private $service;
    public function __construct() {
        $this->service = new LabelService();
    }

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