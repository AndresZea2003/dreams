<?php

namespace App\DTO;

use App\Models\Payment;
use Spatie\LaravelData\Data;

class PaymentData extends Data
{
    public function __construct(
        public int $id,
        public string $reference,
        public string $description,
        public int $amount,
        public string $status,
        public string $process_url,
        public int $request_id,
        public int $user_id,
        public int $invoice_id,
    ) {
    }
    public static function fromModel(Payment $payment): self
    {
        return new self($payment->id, $payment->reference, $payment->description, $payment->amount, $payment->status, $payment->process_url,
                        $payment->request_id, $payment->user_id, $payment->invoice_id);
    }
}
