<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Tests;

use Jenky\JsonPlaceholder\DTO\Post;
use Jenky\JsonPlaceholder\DTO\PostCollection;

final class PostTest extends TestCase
{
    public function test_get_list_posts(): void
    {
        $posts = $this->sdk->withClient($this->createMockClient(
            __DIR__.'/fixtures/post/posts.json'
        ))->posts()->get();

        $this->assertInstanceOf(PostCollection::class, $posts);
        $this->assertCount(100, $posts);
        $this->assertSame('sunt aut facere repellat provident occaecati excepturi optio reprehenderit', $posts[0]->title);
    }

    public function test_get_list_of_post_with_pagination(): void
    {
        $posts = $this->sdk->posts()->get(2, 10);

        $this->assertInstanceOf(PostCollection::class, $posts);
        $this->assertCount(10, $posts);
    }

    public function test_find_post_by_id(): void
    {
        $post = $this->sdk->posts()->id($id = rand(1, 10))->find();

        $this->assertInstanceOf(Post::class, $post);
        $this->assertSame($id, $post->id);
    }
}
