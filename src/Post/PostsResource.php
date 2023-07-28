<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use CuyZ\Valinor\MapperBuilder;
use Jenky\JsonPlaceholder\DTO\Post;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class PostsResource
{
    public function __construct(private JsonPlaceholder $connector)
    {
    }

    /**
     * Get list of posts.
     *
     * @return Post[]
     */
    public function get(): array
    {
        $response = $this->connector->send(new GetPostsRequest())
            ->throw();

        return (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper()
            ->map(Post::class.'[]', $response->data());
    }
}
