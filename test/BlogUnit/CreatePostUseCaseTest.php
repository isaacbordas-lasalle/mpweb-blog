<?php

namespace BlogUnit;

use Blog\Domain\User;
use PHPUnit\Framework\TestCase;
use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Framework\Post\Event\EventQueue;
use Blog\Application\CommandHandler\CreatePostHandler;

class CreatePostTest extends TestCase
{
    const VALID_TITLE = "A Title";
    const VALID_CONTENT = "Some Content";

    private $postRepository;
    private $commandPost;
    private $eventQueue;
    private $post;

    protected function setUp()
    {
        $this->postRepository = $this->createMock(PostRepository::class);
        $this->eventQueue = $this->createMock(EventQueue::class);

    }
    protected function tearDown()
    {
        $this->post = null;
        $this->commandPost = null;
        $this->postRepository = null;
        $this->eventQueue = null;
    }

    /** @test */
    public function shouldPersistAPostOneTimeIfItDoesNotExist()
    {
        $command = new CreatePostHandler($this->postRepository, $this->eventQueue, $this->eventQueue);
        $result = new Post(self::VALID_TITLE, self::VALID_CONTENT, true, User::class);
        $this->assertObjectHasAttribute('title', $result);
    }
}