<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

use Psr\Http\Message\ResponseInterface;

final class ErrorResponse
{
    public function __construct(
        public readonly int $statusCode,
        public readonly string $reason,
    ) {
    }

    public static function fromResponse(ResponseInterface $response): self
    {
        return new self($response->getStatusCode(), $response->getReasonPhrase());
    }
}
