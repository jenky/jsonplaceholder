<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Jenky\Atlas\Request;

final class GetUsersRequest extends Request
{
    public function endpoint(): string
    {
        return '/users';
    }
}
