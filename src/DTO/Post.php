<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

final class Post
{
    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly string $title,
        public readonly string $body
    ) {
    }
}
