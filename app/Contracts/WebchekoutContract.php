<?php

namespace App\Contracts;

use App\Models\Payment;

interface WebchekoutContract
{
    public function getInformation(?int $session_id);
    public function createSession(array $data);
}
