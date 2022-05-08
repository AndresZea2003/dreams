<?php

namespace Mocks;

use App\Models\Invoice;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function testWebcheckoutCreateSessionMock()
    {
        $processUrl = 'https://checkout-co.placetopay.com/session/1/cc9b8690b1f7228c78b759ce27d7e80a';
        $response = json_encode([
            'status' => [
                'status' => 'OK',
                'reason' => 'PC',
                'message' => 'La petición se ha procesado correctamente',
                'date' => '2021-11-30T15:08:27-05:00',
            ],
            'requestId' => 1,
            'processUrl' => $processUrl,
        ]);

        $mock = new MockHandler([
            new Response(200, [], $response),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $this->app->bind(ClientInterface::class, fn () => $client);

        $user = User::factory()->create()->assignRole('user');
        $invoice = Invoice::factory()->create([
            'status' => 'APPROVED',
            'user_id' => $user->id,
            'quantity_products' => 7,
        ]);
        $data = [
            'reference' => 1234567891,
            'description' => 'Pago desde un test',
            'amount' => $invoice->amount,
            'invoice_id' => $invoice->id,
        ];
        $response = $this->actingAs($user)->post(route('payments.store'), $data);

        $response->assertRedirect($processUrl);

        $this->assertDatabaseHas('payments', [
            'reference' => 1234567891,
            'description' => 'Pago desde un test',
            'amount' => $invoice->amount,
            'invoice_id' => $invoice->id,
        ]);
    }

//    Hacer mock con getSession
//    public function testWebcheckoutGetRequestInformationMock()
//    {
//        $processUrl = "https://checkout-co.placetopay.com/session/1/cc9b8690b1f7228c78b759ce27d7e80a";
//        $response = json_encode([
//                "requestId" => 1,
//                "status" => [
//                    "status" => "APPROVED",
//                    "reason" => "00",
//                    "message" => "La petición ha sido aprobada exitosamente",
//                    "date" => "2021-11-30T15:49:47-05:00"
//                ],
//                "request" => [
//                    "locale" => "es_CO",
//                    "payer" => [
//                        "document" => "1033332222",
//                        "documentType" => "CC",
//                        "name" => "Name",
//                        "surname" => "LastName",
//                        "email" => "dnetix1@app.com",
//                        "mobile" => "3111111111",
//                        "address" => [
//                            "postalCode" => "12345"
//                        ]
//                    ],
//                    "payment" => [
//                        "reference" => "1122334455",
//                        "description" => "Prueba",
//                        "amount" => [
//                            "currency" => "USD",
//                            "total" => 1000
//                        ],
//                        "allowPartial" => false,
//                        "subscribe" => false
//                    ],
//                    "fields" => [
//                        [
//                            "keyword" => "_processUrl_",
//                            "value" => "https://test.placetopay.com/redirection/session/1/cb0f71a1f1ecdfab3ac345d3d670b097",
//                            "displayOn" => "none"
//                        ]
//                    ],
//                    "returnUrl" => "https=>//redirection.test/home",
//                    "ipAddress" => "127.0.0.1",
//                    "userAgent" => "PlacetoPay Sandbox",
//                    "expiration" => "2021-12-30T00:00:00-05:00"
//                ],
//                "payment" => [
//                    [
//                        "status" => [
//                            "status" => "APPROVED",
//                            "reason" => "00",
//                            "message" => "Aprobada",
//                            "date" => "2021-11-30T15:49:36-05:00"
//                        ],
//                        "internalReference" => 1,
//                        "paymentMethod" => "visa",
//                        "paymentMethodName" => "Visa",
//                        "issuerName" => "JPMORGAN CHASE BANK, N.A.",
//                        "amount" => [
//                            "from" => [
//                                "currency" => "USD",
//                                "total" => 1000
//                            ],
//                            "to" => [
//                                "currency" => "USD",
//                                "total" => 1000
//                            ],
//                            "factor" => 1
//                        ],
//                        "authorization" => "000000",
//                        "reference" => "1122334455",
//                        "receipt" => "241516",
//                        "franchise" => "DF_VS",
//                        "refunded" => false,
//                        "processorFields" => [
//                            [
//                                "keyword" => "merchantCode",
//                                "value" => "7200076413",
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "terminalNumber",
//                                "value" => "PT312002",
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "credit",
//                                "value" => [
//                                    "code" => "0",
//                                    "type" => "00",
//                                    "groupCode" => "C",
//                                    "installments" => 0
//                                ],
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "totalAmount",
//                                "value" => 1000,
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "iceAmount",
//                                "value" => 0,
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "bin",
//                                "value" => "411111",
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "expiration",
//                                "value" => "1229",
//                                "displayOn" => "none"
//                            ],
//                            [
//                                "keyword" => "lastDigits",
//                                "value" => "1111",
//                                "displayOn" => "none"
//                            ]
//                        ]
//                    ]
//                ],
//                "subscription" => null
//            ]
//        );
//
//        $mock = new MockHandler([
//            new Response(200, [], $response),
//        ]);
//
//        $handlerStack = HandlerStack::create($mock);
//        $client = new Client(['handler' => $handlerStack]);
//        $this->app->bind(ClientInterface::class, fn() => $client);
//
//        $user = User::factory()->create()->assignRole('user');
//        $invoice = Invoice::factory()->create([
//            'status' => 'APPROVED',
//            'user_id' => $user->id,
//            'quantity_products' => 7,
//        ]);
//        $data = [
//            session_id(1)
////            'reference' => 1234567891,
////            'description' => 'Pago desde un test',
////            'amount' => $invoice->amount,
////            'invoice_id' => $invoice->id,
//        ];
//
//        $response = $this->actingAs($user)->post(route('payment.get-request-information'), $data);
//
////        $response->assertRedirect($processUrl);
//
//        $this->assertDatabaseHas('payments', [
//            'reference' => 1234567891,
//            'description' => 'Pago desde un test',
//            'amount' => $invoice->amount,
//            'invoice_id' => $invoice->id,
//        ]);
//    }
}
