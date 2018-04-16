<?php

namespace BlogUnit;

use PHPUnit\Framework\TestCase;
use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Events\EventQueue;
use Blog\Application\CreatePostUseCase;

class CreatePostTest extends TestCase
{
    const VALID_TITLE = "A Title";
    const VALID_CONTENT = "Some Content";

    private $createPostUseCase;
    private $postRepository;
    private $eventQueue;
    private $post;

    protected function setUp()
    {
        $this->post = new Post(self::VALID_TITLE, self::VALID_CONTENT);
        $this->postRepository = $this->createMock(PostRepository::class);
        $this->eventQueue = $this->createMock(EventQueue::class);
        $this->createPostUseCase = new CreatePostUseCase($this->postRepository, $this->eventQueue);
    }
    protected function tearDown()
    {
        $this->post = null;
        $this->postRepository = null;
        $this->eventQueue = null;
        $this->createPostUseCase = null;
    }

    /** @test */
    public function shouldPersistAPostOneTimeIfItDoesNotExist()
    {
        $this->givenAPostRepositoryThatDoesntHaveASpecificPost();
        $this->thenThePostShouldBeSavedOnce();
        $this->whenTheNewPostUseCaseIsExecutedWithASpecificPost();
    }
}