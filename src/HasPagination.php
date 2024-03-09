<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

trait HasPagination
{
    private ?int $limit = null;

    private ?int $page = null;

    public function limit(int $limit): self
    {
        $clone = clone $this;
        $clone->page = $limit;

        return $clone;
    }

    public function page(int $page): self
    {
        $clone = clone $this;
        $clone->page = $page;

        return $clone;
    }
}
