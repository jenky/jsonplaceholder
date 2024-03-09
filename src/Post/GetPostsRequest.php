<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Post;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\HasPagination;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<PostCollection|ErrorResponse>
 */
final class GetPostsRequest extends Request
{
    use HasPagination;

    public function endpoint(): string
    {
        return '/posts';
    }

    protected function defaultQuery(): array
    {
        return \array_filter([
            '_page' => $this->page,
            '_limit' => $this->limit,
        ]);
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(PostCollection::class);
    }
}
