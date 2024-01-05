<?php

declare(strict_types=1);

namespace Jenky\JsonPlaceholder\Tests;

use Jenky\JsonPlaceholder\DTO\PostCollection;
use Jenky\JsonPlaceholder\DTO\User;
use Jenky\JsonPlaceholder\DTO\UserCollection;

final class UserTest extends TestCase
{
    public function test_get_list_users(): void
    {
        $users = $this->sdk->withClient($this->createMockClient(
            __DIR__.'/fixtures/user/users.json'
        ))->users()->get();

        $this->assertInstanceOf(UserCollection::class, $users);
        $this->assertCount(10, $users);
        $this->assertSame('Leanne Graham', $users[0]->name);
    }

    public function test_find_user_by_id(): void
    {
        $user = $this->sdk->user($id = rand(1, 10))->get();

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($id, $user->id);
    }

    public function test_get_user_posts_by_user_id(): void
    {
        $posts = $this->sdk->withClient(
            $this->createMockClient(__DIR__.'/fixtures/user/posts.json')
        )->user(1)->posts();

        $this->assertInstanceOf(PostCollection::class, $posts);
        $this->assertCount(10, $posts);
        $this->assertSame(1, $posts[0]->userId);
    }
}
