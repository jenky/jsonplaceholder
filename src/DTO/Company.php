<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

final class Company
{
    public function __construct(
        public readonly string $name,
        public readonly string $catchPhrase,
        public readonly string $bs,
    ) {
    }
}
