<?php

namespace Sistema42\MelhorEnvioApi\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

trait SimpleRequest {
    public function _get(string $url, array $headers, ?array $queryParams = [], $errorReturn = false) : string
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

            $error = "Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'response' => json_encode($response),
            ]);

            if ($errorReturn) {
                return json_encode(['error' => $error]);
            }

            throw new Exception($error);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function _post(string $url, array $headers, ?array $body = [], $errorReturn = false) : string
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $url, $headers, $body);
            if ((string) $response->getStatusCode()[0] == 2) {
                return $response->getBody();
            }

            $error = "Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'body' => $body,
                'response' => json_encode($response),
            ]);

            if ($errorReturn) {
                return json_encode(['error' => $error]);
            }

            throw new Exception($error);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function _delete(string $url, array $headers, ?array $body = [], $errorReturn = false) : string
    {
        try {
            $client = new Client();
            $response = $client->request('DELETE', $url, $headers, $body);
            if ((string) $response->getStatusCode()[0] == 2) {
                return $response->getBody();
            }

            $error = "Error on request: " . json_encode([
                'url' => $url,
                'headers' => $headers,
                'body' => $body,
                'response' => json_encode($response),
            ]);

            if ($errorReturn) {
                return json_encode(['error' => $error]);
            }

            throw new Exception($error);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}