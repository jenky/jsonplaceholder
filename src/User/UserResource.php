<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\DTO\User;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class UserResource
{
    public function __construct(
        private JsonPlaceholder $connector,
        private int $id
    ) {
    }

    /**
     * Get a single user.
     */
    public function find(): User
    {
        return $this->connector->send(new FindUserRequest($this->id))
            ->throw()
            ->object();
    }

    /**
     * Get list of posts for user.
     */
    public function posts(): PostCollection
    {
        return $this->connector->send(new GetUserPostsRequest($this->id))
            ->throw()
            ->object();
    }
}
