<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\HasPagination;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<PostCollection|ErrorResponse>
 */
final class GetUserPostsRequest extends Request
{
    use HasPagination;

    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/users/'.$this->id.'/posts';
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
