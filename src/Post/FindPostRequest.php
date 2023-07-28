<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Jenky\Atlas\Request;

final class FindPostRequest extends Request
{
    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/posts/'.$this->id;
    }
}
