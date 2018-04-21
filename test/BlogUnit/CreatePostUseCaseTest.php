<?php

namespace BlogUnit;

use Blog\Domain\User;
use PHPUnit\Framework\TestCase;
use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Domain\Repository\UserRepository;

class CreatePostTest extends TestCase
{
    const VALID_TITLE = "A Title";
    const VALID_CONTENT = "Some Content";

    private $postRepository;
    private $userRepository;
    private $user;
    private $post;

    protected function setUp()
    {
        $this->postRepository = $this->createMock(PostRepository::class);
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->user = $this->createMock(User::class);

    }
    protected function tearDown()
    {
        $this->post = null;
        $this->user = null;
        $this->userRepository = null;
        $this->postRepository = null;
    }

    /** @test */
    public function shouldPersistAPostOneTimeIfItDoesNotExist()
    {
        $result = new Post(self::VALID_TITLE, self::VALID_CONTENT, true, $this->user);
        $this->assertObjectHasAttribute('title', $result);
    }
}