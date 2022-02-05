<?php

namespace App\DTO;

use App\Models\User;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string|null $disabledAt,
        public string $role
    ) {
    }
    public static function fromModel(User $user): self
    {
        return new self($user->id, $user->name, $user->email, $user->disabled_at, $user->getRoleNames()[0]);
    }
}
