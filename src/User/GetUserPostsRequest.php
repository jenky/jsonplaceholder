<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<PostCollection>
 */
final class GetUserPostsRequest extends Request
{
    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/users/'.$this->id.'/posts';
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(PostCollection::class);
    }
}
