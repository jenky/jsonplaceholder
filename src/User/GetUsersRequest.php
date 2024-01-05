<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\UserCollection;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<UserCollection>
 */
final class GetUsersRequest extends Request
{
    public function endpoint(): string
    {
        return '/users';
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(UserCollection::class);
    }
}
