<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\Post;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<Post>
 */
final class FindPostRequest extends Request
{
    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/posts/'.$this->id;
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(Post::class);
    }
}
