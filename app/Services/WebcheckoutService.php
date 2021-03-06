<?php

namespace App\Services;

use App\Contracts\WebchekoutContract;
use App\Requests\CreateSessionRequest;
use App\Requests\GetInformationRequest;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class WebcheckoutService implements WebchekoutContract
{
    public Client $client;
    public function __construct()
    {
//        $this->client = new Client();
        $this->client = new Client();
        $this->client = app(ClientInterface::class);
    }

    public function getInformation(?int $session_id)
    {
        $getInformation = new GetInformationRequest();
        $data = $getInformation->auth();
        $url = $getInformation::url($session_id);
        return $this->request($data, $url);
    }

    public function createSession(array $data)
    {
        $createSessionRequest = new CreateSessionRequest($data);

        $data = $createSessionRequest->toArray();
        $url = $createSessionRequest::url(null);
        return $this->request($data, $url);
    }

    private function request(array $data, string $url)
    {
        $response = $this->client->request('post', $url, [
            'json' => $data,
            'verify' => false,
        ]);
        $content = $response->getBody()->getContents();
        return json_decode($content, true);
    }
}
