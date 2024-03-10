<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\Post;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\JsonPlaceholder;
use Jenky\JsonPlaceholder\ResourceBuilder;
use Jenky\JsonPlaceholder\User\GetUserPostsRequest;
use Jenky\JsonPlaceholder\User\UserResource;

/**
 * @extends ResourceBuilder<JsonPlaceholder>
 */
final class PostResource extends ResourceBuilder
{
    /**
     * Get list of posts for user.
     */
    public function get(?int $page = null, ?int $limit = null): PostCollection|ErrorResponse
    {
        $userId = $this->refs[UserResource::class] ?? null;
        $request = $userId ? new GetUserPostsRequest((int) $userId) : new GetPostsRequest();

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
     * Get a single post.
     */
    public function find(): Post|ErrorResponse
    {
        return $this->connector->send(new FindPostRequest((int) $this->id))
            ->object();
    }
}
