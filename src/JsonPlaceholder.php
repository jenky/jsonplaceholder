<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use Fansipan\Contracts\ConnectorInterface;
use Fansipan\Traits\ConnectorTrait;
use Jenky\JsonPlaceholder\Post\PostResource;
use Jenky\JsonPlaceholder\User\UserResource;

final class JsonPlaceholder implements ConnectorInterface
{
    use ConnectorTrait;

    public static function baseUri(): ?string
    {
        return 'https://jsonplaceholder.typicode.com/';
    }

    public function users(): UserResource
    {
        return new UserResource($this);
    }

    public function posts(): PostResource
    {
        return new PostResource($this);
    }
}
