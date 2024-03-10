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
     * @param  array<string, string|int> $refs
     */
    public function __construct(
        protected ConnectorInterface $connector,
        protected array $refs = [],
    ) {
    }

    /**
     * Set the id of the current resource.
     */
    public function id(string|int $id): static
    {
        $clone = clone $this;
        $clone->id = $id;
        $clone->refs[static::class] = $id;

        return $clone;
    }

    /**
     * Forward to another resource with current resource references.
     *
     * @template TResource of ResourceBuilder
     *
     * @param  class-string<TResource> $resource
     * @return TResource
     */
    protected function forward(string $resource): ResourceBuilder
    {
        \assert(\is_subclass_of($resource, ResourceBuilder::class, true));

        return new $resource($this->connector, $this->refs);
    }
}
