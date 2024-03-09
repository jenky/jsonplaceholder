<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\User;
use Jenky\JsonPlaceholder\DTO\UserCollection;
use Jenky\JsonPlaceholder\JsonPlaceholder;
use Jenky\JsonPlaceholder\Post\PostResource;
use Jenky\JsonPlaceholder\ResourceBuilder;

/**
 * @extends ResourceBuilder<JsonPlaceholder>
 */
final class UserResource extends ResourceBuilder
{
    public function get(?int $page = null, ?int $limit = null): UserCollection|ErrorResponse
    {
        $request = new GetUsersRequest();

        if ($page) {
            $request = $request->page($page);
        }

        if ($limit) {
            $request = $request->page($limit);
        }

        return $this->connector->send($request)
            ->object();
    }

    /**
     * Get a single user.
     */
    public function find(): User|ErrorResponse
    {
        return $this->connector->send(new FindUserRequest((int) $this->id))
            ->object();
    }

    /**
     * Get list of posts for user.
     */
    public function posts(): PostResource
    {
        return $this->forward(PostResource::class);
    }
}
