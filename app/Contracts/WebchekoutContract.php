<?php

namespace App\Contracts;

interface WebchekoutContract
{
    public function getInformation(?int $session_id);
    public function createSession(array $data);
}
