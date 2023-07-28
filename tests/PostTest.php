<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Tests;

use Jenky\JsonPlaceholder\DTO\Post;

final class PostTest extends TestCase
{
    public function test_get_list_posts(): void
    {
        $posts = $this->sdk->withClient($this->createMockClient(
            __DIR__.'/fixtures/post/posts.json'
        ))->posts()->get();

        $this->assertCount(100, $posts);
        $this->assertSame('sunt aut facere repellat provident occaecati excepturi optio reprehenderit', $posts[0]->title);
    }

    public function test_find_user_by_id(): void
    {
        $post = $this->sdk->post($id = rand(1, 10))->get();

        $this->assertInstanceOf(Post::class, $post);
        $this->assertSame($id, $post->id);
    }
}
