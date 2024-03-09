<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\UserCollection;
use Jenky\JsonPlaceholder\HasPagination;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<UserCollection|ErrorResponse>
 */
final class GetUsersRequest extends Request
{
    use HasPagination;

    public function endpoint(): string
    {
        return '/users';
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
        return new ValinorDecoder(UserCollection::class);
    }
}
