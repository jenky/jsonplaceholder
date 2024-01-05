<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

use Ramsey\Collection\AbstractCollection;

/**
 * @extends AbstractCollection<User>
 */
final class UserCollection extends AbstractCollection
{
    public function getType(): string
    {
        return User::class;
    }
}
