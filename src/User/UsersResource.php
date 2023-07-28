<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use CuyZ\Valinor\MapperBuilder;
use Jenky\JsonPlaceholder\DTO\User;
use Jenky\JsonPlaceholder\JsonPlaceholder;

final class UsersResource
{
    public function __construct(private JsonPlaceholder $connector)
    {
    }

    /**
     * Get list of users.
     *
     * @return User[]
     */
    public function get(): array
    {
        $response = $this->connector->send(new GetUsersRequest())
            ->throw();

        return (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper()
            ->map(User::class.'[]', $response->data());
    }
}
