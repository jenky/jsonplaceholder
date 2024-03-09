<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Fansipan\Contracts\DecoderInterface;
use Fansipan\Contracts\MapperInterface;
use Fansipan\Decoder\ChainDecoder;
use Jenky\JsonPlaceholder\DTO\ErrorResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * @template T of object
 * @implements MapperInterface<T>
 */
final class ValinorDecoder implements DecoderInterface, MapperInterface
{
    private TreeMapper $mapper;

    private DecoderInterface $decoder;

    /**
     * @param  string|class-string<T> $signature
     */
    public function __construct(
        private readonly string $signature,
        ?TreeMapper $mapper = null,
        ?DecoderInterface $decoder = null
    ) {
        $this->mapper = $mapper ?? (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper();

        $this->decoder = $decoder ?? ChainDecoder::default();
    }

    public function map(ResponseInterface $response): ?object
    {
        $status = $response->getStatusCode();

        if ($status >= 200 && $status < 300) {
            return $this->mapper->map($this->signature, $this->decode($response));
        } else {
            return ErrorResponse::fromResponse($response); // @phpstan-ignore-line
        }
    }

    public function decode(ResponseInterface $response): iterable
    {
        return $this->decoder->decode($response);
    }
}
