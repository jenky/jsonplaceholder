<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Tests;

use Fansipan\Mock\MockClient;
use Fansipan\Mock\MockResponse;
use Jenky\JsonPlaceholder\JsonPlaceholder;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected JsonPlaceholder $sdk;

    protected function setUp(): void
    {
        $this->sdk = new JsonPlaceholder();
    }

    protected function createMockClient(string $file): MockClient
    {
        return new MockClient(MockResponse::fixture($file));
    }
}
