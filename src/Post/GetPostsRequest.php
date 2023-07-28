<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Jenky\Atlas\Request;

final class GetPostsRequest extends Request
{
    public function endpoint(): string
    {
        return '/posts';
    }
}
