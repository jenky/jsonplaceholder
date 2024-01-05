<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class PostsResource
{
    public function __construct(private JsonPlaceholder $connector)
    {
    }

    /**
     * Get list of posts.
     */
    public function get(): PostCollection
    {
        return $this->connector->send(new GetPostsRequest())
            ->throw()
            ->object();
    }
}
