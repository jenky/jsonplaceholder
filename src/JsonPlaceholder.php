<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use Fansipan\Contracts\ConnectorInterface;
use Fansipan\Traits\ConnectorTrait;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\DTO\UserCollection;
use Jenky\JsonPlaceholder\Post\GetPostsRequest;
use Jenky\JsonPlaceholder\Post\PostResource;
use Jenky\JsonPlaceholder\User\GetUsersRequest;
use Jenky\JsonPlaceholder\User\UserResource;

final class JsonPlaceholder implements ConnectorInterface
{
    use ConnectorTrait;

    public static function baseUri(): ?string
    {
        return 'https://jsonplaceholder.typicode.com/';
    }

    /**
     * Get list of users.
     */
    public function users(): UserCollection
    {
        return $this->send(new GetUsersRequest())
            ->throw()
            ->object();
    }

    public function user(int $id): UserResource
    {
        return new UserResource($this, $id);
    }

    /**
     * Get list of posts.
     */
    public function posts(): PostCollection
    {
        return $this->send(new GetPostsRequest())
            ->throw()
            ->object();
    }

    public function post(int $id): PostResource
    {
        return new PostResource($this, $id);
    }
}
