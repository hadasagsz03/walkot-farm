<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

trait ApiTrait
{
    public function get_berita($id)
    {
        $client = new Client();

        try {
            $response = $client->post('https://barat.jakarta.go.id/api/v1/get-berita/' . $id, [
                'headers' => [
                    'Authorization' => env("JAKARTA_BARAT_API_KEY"),
                    'Accept'        => 'application/json',
                ],
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if ($response->getStatusCode() == 200) {
                return $data['data'] ?? null;
            } else {
                return 'Error: ' . $data['message'];
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                return 'Request failed with status ' . $statusCode . ': ' . $body;
            } else {
                return 'Request failed: ' . $e->getMessage();
            }
        }
    }

    public function get_latest_berita($tags)
    {
        $client = new Client();

        try {
            $response = $client->post('https://barat.jakarta.go.id/api/v1/get-latest-berita-wilayah/' . str_replace(' ', '%20', strtolower($tags)), [
                'headers' => [
                    'Authorization' => env("JAKARTA_BARAT_API_KEY"),
                    'Accept'        => 'application/json',
                ],
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if ($response->getStatusCode() == 200) {
                return $data['data'] ?? null;
            } else {
                return 'Error: ' . $data['message'];
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                return 'Request failed with status ' . $statusCode . ': ' . $body;
            } else {
                return 'Request failed: ' . $e->getMessage();
            }
        }
    }

    public function get_paginate_berita($tags)
    {
        $client = new Client();
        $queryParams = [];

        $components = parse_url(url()->full());
        if (isset($components['query'])) {
            parse_str($components['query'], $results);

            if (isset($results['page'])) {
                $queryParams['page'] = $results['page'] ?: 1;
            }

            if (isset($results['search']) && !empty($results['search'])) {
                $queryParams['search'] = $results['search'];
                $berita['search'] = $results['search'];
            }
        }

        try {
            $response = $client->post('https://barat.jakarta.go.id/api/v1/get-paginate-berita-wilayah/' . str_replace(' ', '%20', strtolower($tags)), [
                'headers' => [
                    'Authorization' => env("JAKARTA_BARAT_API_KEY"),
                    'Accept'        => 'application/json',
                ],
                'form_params' => [
                    'tags' => strtolower($tags),
                    'page' => $queryParams['page'] ?? 1,
                    'search' => $queryParams['search'] ?? null,
                ],
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            if ($data) {
                return $data ?? [];
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                return 'Request failed with status ' . $statusCode . ': ' . $body;
            } else {
                return 'Request failed: ' . $e->getMessage();
            }
        }
    }
}
