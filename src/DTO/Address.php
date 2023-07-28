<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

final class Address
{
    public function __construct(
        public readonly string $street,
        public readonly string $suite,
        public readonly string $city,
        public readonly string $zipcode,
        /** @var array{lat: string, lng: string} */
        public readonly array $geo
    ) {
    }
}
