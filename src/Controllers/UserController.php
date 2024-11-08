<?php

namespace Sistema42\Controllers;

use Sistema42\Services\UserService;

class UserController {
    public function __construct(private readonly UserService $service) {}

    public function info() : string
    {
        return $this->service->info();
    }

    public function addresses() : string
    {
        return $this->service->addresses();
    }

    public function balance() : string
    {
        return $this->service->balance();
    }

    public function addFunds(array $data) : string
    {
        return $this->service->addFunds($data);
    }

    public function companies() : string
    {
        return $this->service->companies();
    }

    public function company(string $id) : string
    {
        return $this->service->company($id);
    }

    public function addCompany(array $data) : string
    {
        return $this->service->addCompany($data);
    }

    public function companyAddress(string $id) : string
    {
        return $this->service->companyAddress($id);
    }

    public function addCompanyAddress(string $id, array $data) : string
    {
        return $this->service->addCompanyAddress($id, $data);
    }

    public function companyPhone(string $id) : string
    {
        return $this->service->companyPhone($id);
    }

    public function addCompanyPhone(string $id, array $data) : string
    {
        return $this->service->addCompanyPhone($id, $data);
    }

}
