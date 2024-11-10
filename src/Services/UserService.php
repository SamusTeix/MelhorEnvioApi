<?php

namespace Sistema42\MelhorEnvioApi\Services;

use Sistema42\MelhorEnvioApi\Helpers\Config;
use Sistema42\MelhorEnvioApi\Traits\SimpleRequest;

final class UserService {
    use SimpleRequest;

    const URL_ME = '/api/v2/me';
    const URL_COMPANIES = '/api/v2/me/companies';

    public function info() : string
    {
        $url = Config::getUrl() . self::URL_ME;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function addresses() : string
    {
        $url = Config::getUrl() . self::URL_ME . '/addresses';
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function balance() : string
    {
        $url = Config::getUrl() . self::URL_ME . '/balance';
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function addFunds(array $data) : string
    {
        $body = [
            'body' => [
                'gateway' => $data['gateway'],
                'redirect' => $data['redirect'],
                'value' => $data['value'],
            ],
        ];

        $url = Config::getUrl() . self::URL_ME . '/balance';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function companies() : string
    {
        $url = Config::getUrl() . self::URL_COMPANIES;
        $headers = Config::getPostHeader();

        return $this->_get($url, $headers);
    }

    public function company(string $id) : string
    {
        $url = Config::getUrl() . self::URL_COMPANIES . '/' . $id;
        $headers = Config::getAcceptAuthUserAgentHeader();

        return $this->_get($url, $headers);
    }

    public function addCompany(array $data) : string
    {
        $body = [
            'body' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'description' => $data['description'],
                'company_name' => $data['company_name'],
                'document' => $data['document'],
                'state_register' => $data['state_register'],
            ],
        ];

        $url = Config::getUrl() . self::URL_COMPANIES;
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function companyAddress(string $id) : string
    {
        $url = Config::getUrl() . self::URL_COMPANIES . '/' . $id . '/addresses';
        $headers = Config::getPostHeader();

        return $this->_get($url, $headers);
    }

    public function addCompanyAddress(string $id, array $data) : string
    {
        $body = [
            'body' => [
                'postal_code' => $data['postal_code'],
                'address' => $data['address'],
                'number' => $data['number'],
                'complement' => $data['complement'],
                'city' => $data['city'],
                'state' => $data['state'],
            ],
        ];

        $url = Config::getUrl() . self::URL_COMPANIES . '/' . $id . '/addresses';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }

    public function companyPhone(string $id) : string
    {
        $url = Config::getUrl() . self::URL_COMPANIES . '/' . $id . '/phones';
        $headers = Config::getPostHeader();

        return $this->_get($url, $headers);
    }

    public function addCompanyPhone(string $id, array $data) : string
    {
        $body = [
            'body' => [
                'type' => $data['type'],
                'phone' => $data['phone'],
            ],
        ];

        $url = Config::getUrl() . self::URL_COMPANIES . '/' . $id . '/phones';
        $headers = Config::getPostHeader();

        return $this->_post($url, $headers, $body);
    }
}