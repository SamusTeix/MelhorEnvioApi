<?php

namespace Sistema42\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

trait SimpleRequest {
    public function _get(string $url, array $headers, ?array $queryParams = []) : string
    {
        try {
            if (count($queryParams)) {
                $url .= '?' . http_build_query($queryParams);
            }

            $client = new Client();
            $response = $client->request('GET', $url, $headers);
            if ((string) $response->getStatusCode()[0] == 2) {
                return $response->getBody();
            }

            throw new Exception("Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'response' => $response->getBody(),
            ]));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function _post(string $url, array $headers, ?array $body = []) : string
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $url, $headers, $body);
            if ((string) $response->getStatusCode()[0] == 2) {
                return $response->getBody();
            }

            throw new Exception("Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'response' => $response->getBody(),
            ]));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function _delete(string $url, array $headers, ?array $body = []) : string
    {
        try {
            $client = new Client();
            $response = $client->request('DELETE', $url, $headers, $body);
            if ((string) $response->getStatusCode()[0] == 2) {
                return $response->getBody();
            }

            throw new Exception("Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'response' => $response->getBody(),
            ]));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}