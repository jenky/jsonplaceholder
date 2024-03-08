<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

final class User
{
    public function __construct(
        public readonly int $id,
        public readonly Address $address,
        public readonly string $name,
        public readonly string $username,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $website,
        public readonly Company $company
    ) {
    }
}
