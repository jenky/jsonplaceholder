<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\User;

use Fansipan\Contracts\DecoderInterface;
use Fansipan\Request;
use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Jenky\JsonPlaceholder\DTO\User;
use Jenky\JsonPlaceholder\ValinorDecoder;

/**
 * @extends Request<User|ErrorResponse>
 */
final class FindUserRequest extends Request
{
    public function __construct(private int $id)
    {
    }

    public function endpoint(): string
    {
        return '/users/'.$this->id;
    }

    public function decoder(): DecoderInterface
    {
        return new ValinorDecoder(User::class);
    }
}
