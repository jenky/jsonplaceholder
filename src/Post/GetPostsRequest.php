<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<PostCollection>
 */
final class GetPostsRequest extends Request
{
    public function endpoint(): string
    {
        return '/posts';
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(PostCollection::class);
    }
}
