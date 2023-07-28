<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Jenky\Atlas\Request;

final class FindUserRequest extends Request
{
    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/users/'.$this->id;
    }
}
