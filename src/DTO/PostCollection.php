<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\DTO;

use Ramsey\Collection\AbstractCollection;

/**
 * @extends AbstractCollection<Post>
 */
final class PostCollection extends AbstractCollection
{
    public function getType(): string
    {
        return Post::class;
    }
}
