<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Jenky\JsonPlaceholder\DTO\UserCollection;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class UsersResource
{
    public function __construct(private JsonPlaceholder $connector)
    {
    }

    /**
     * Get list of users.
     */
    public function get(): UserCollection
    {
        return $this->connector->send(new GetUsersRequest())
            ->throw()
            ->object();
    }
}
