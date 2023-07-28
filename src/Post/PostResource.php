<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use CuyZ\Valinor\MapperBuilder;
use Jenky\JsonPlaceholder\DTO\Post;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class PostResource
{
    public function __construct(
        private JsonPlaceholder $connector,
        private int $id
    ) {
    }

    /**
     * Get a single post.
     */
    public function get(): Post
    {
        $response = $this->connector->send(new FindPostRequest($this->id))
            ->throw();

        return (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper()
            ->map(Post::class, $response->data());
    }
}
