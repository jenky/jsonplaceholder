<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Fansipan\Contracts\DecoderInterface;
use Fansipan\Contracts\MapperInterface;
use Fansipan\Decoder\ChainDecoder;
use Psr\Http\Message\ResponseInterface;

final class ValinorDecoder implements DecoderInterface, MapperInterface
{
    private TreeMapper $mapper;

    private DecoderInterface $decoder;

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
        $decoded = $this->decode($response);

        if ($status >= 200 && $status < 300) {
            return $this->mapper->map($this->signature, $decoded);
        } else {
            return null;
        }
    }

    public function decode(ResponseInterface $response): iterable
    {
        return $this->decoder->decode($response);
    }
}
