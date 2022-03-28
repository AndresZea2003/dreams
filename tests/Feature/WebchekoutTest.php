<?php

namespace Tests\Feature;

use App\Requests\CreateSessionRequest;
use App\Requests\GetInformationRequest;
use App\Services\WebcheckoutService;
use Tests\TestCase;

class WebchekoutTest extends TestCase
{
    public function testItCanGetInformationRequest()
    {
        $request = (new GetInformationRequest())->auth();
        $this->assertAuthSuccess($request);
    }

    public function testItCanGetCreateSessionRequest()
    {
        $request = (new CreateSessionRequest($this->getCreateSessionData()))->toArray();
        $this->assertAuthSuccess($request);

        $this->assertArrayHasKey('payment', $request);
        $this->assertArrayHasKey('expiration', $request);
        $this->assertArrayHasKey('locale', $request);
        $this->assertArrayHasKey('returnUrl', $request);

        dd($request);
    }

    public function testItCanCreateSessionFromServiceCorrectly()
    {
        $data = $this->getCreateSessionData();
        $response = (new WebcheckoutService())->createSession($data);
        $this->assertArrayHasKey('status', $response);
        $this->assertEquals('OK', $response['status']['status']);
        $this->assertArrayHasKey('requestId', $response);
        $this->assertArrayHasKey('processUrl', $response);

        $session_id = $response['requestId'];
        $responseGetSession = $response = (new WebcheckoutService())->getInformation($session_id);
        $this->assertEquals($session_id, $responseGetSession['requestId']);
        $this->assertArrayHasKey('status', $response);
        $this->assertEquals('PENDING', $response['status']['status']);
    }

    private function assertAuthSuccess(array $request): void
    {
        $this->assertArrayHasKey('auth', $request);
        $this->assertArrayHasKey('login', $request['auth']);
        $this->assertArrayHasKey('tranKey', $request['auth']);
        $this->assertArrayHasKey('nonce', $request['auth']);
        $this->assertArrayHasKey('seed', $request['auth']);
    }

    private function getCreateSessionData(): array
    {
        return [
            'payment' => [
                'reference' => 'TEST_1000',
                'description' => 'Conexion con WebCheckout desde un test',
                'amount' => [
                    'currency' => 'COP',
                    'total' => '50000',
                ],
            ],
            'returnUrl' => route('home'),
            'expiration' => date('c', strtotime('+2 days')),
        ];
    }
}
