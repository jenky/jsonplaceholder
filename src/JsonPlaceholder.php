<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use Fansipan\Contracts\ConnectorInterface;
use Fansipan\Traits\ConnectorTrait;
use Jenky\JsonPlaceholder\Post\PostResource;
use Jenky\JsonPlaceholder\Post\PostsResource;
use Jenky\JsonPlaceholder\User\UserResource;
use Jenky\JsonPlaceholder\User\UsersResource;

final class JsonPlaceholder implements ConnectorInterface
{
    use ConnectorTrait;

    public static function baseUri(): ?string
    {
        return 'https://jsonplaceholder.typicode.com/';
    }

    public function users(): UsersResource
    {
        return new UsersResource($this);
    }

    public function user(int $id): UserResource
    {
        return new UserResource($this, $id);
    }

    public function posts(): PostsResource
    {
        return new PostsResource($this);
    }

    public function post(int $id): PostResource
    {
        return new PostResource($this, $id);
    }
}
