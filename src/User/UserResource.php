<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use CuyZ\Valinor\MapperBuilder;
use Jenky\JsonPlaceholder\DTO\Post;
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
    public function get(): User
    {
        $response = $this->connector->send(new FindUserRequest($this->id))
            ->throw();

        return (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper()
            ->map(User::class, $response->data());
    }

    /**
     * Get list of posts for user.
     *
     * @return Post[]
     */
    public function posts(): array
    {
        $response = $this->connector->send(new GetUserPostsRequest($this->id))
            ->throw();

        return (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper()
            ->map(Post::class.'[]', $response->data());
    }
}
