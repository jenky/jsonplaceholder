<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use Fansipan\Contracts\ConnectorInterface;

/**
 * @template T of ConnectorInterface
 */
abstract class ResourceBuilder
{
    protected string|int $id;

    /**
     * @param  T $connector
     */
    public function __construct(
        protected ConnectorInterface $connector,
        protected array $refs = [],
    ) {
    }

    public function id(string|int $id): static
    {
        $clone = clone $this;
        $clone->id = $id;
        $clone->refs[static::class] = $id;

        return $clone;
    }

    /**
     * @template TResource of ResourceBuilder
     *
     * @param  class-string<TResource> $builder
     * @return TResource
     */
    protected function forward(string $builder): ResourceBuilder
    {
        \assert(\is_subclass_of($builder, ResourceBuilder::class, true));

        return new $builder($this->connector, $this->refs);
    }
}
