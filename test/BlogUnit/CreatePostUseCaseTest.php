<?php

namespace BlogUnit;

use Blog\Domain\User;
use PHPUnit\Framework\TestCase;
use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Domain\Repository\UserRepository;
use Blog\Application\Command\CreatePostCommand;
use Blog\Framework\Post\Event\EventQueue;
use Blog\Framework\Post\Event\PostEvent;

class CreatePostTest extends TestCase
{

    private $postRepository;
    private $userRepository;
    private $eventQueue;
    private $user;
    private $post;

    protected function setUp()
    {
        $this->postRepository = $this->createMock(PostRepository::class);
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->eventQueue = $this->createMock(EventQueue::class);
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
    public function shouldPersistAPost()
    {
        $result = new CreatePostCommand('Valid title', 'Valid content', true, 1);
        $this->assertObjectHasAttribute('title', $result);
    }

    /**
     * @test
     * @dataProvider shouldThrowExceptionIfNoValidTitleLengthDataProvider
     */
    public function shouldThrowExceptionIfNoValidTitleLength($title, $content, $expectedException)
    {
        $this->expectException($expectedException);
        $result = new Post($title, $content, true, $this->user);
    }

    public function shouldThrowExceptionIfNoValidTitleLengthDataProvider()
    {
        return [
            'title invalid length' => ['More than 50 characters Aaaaaaaaaa Aaaaaaaaaa Aaaaaaaaaa Aaaaaaaaaa a', 'Valid content', 'Blog\Domain\Exception\InvalidTitleLengthException'],
            'no title' => ['', 'Valid content', 'Blog\Domain\Exception\InvalidTitleLengthException']
        ];
    }

    /**
     * @test
     * @dataProvider shouldThrowExceptionIfNoValidContentLengthDataProvider
     */
    public function shouldThrowExceptionIfNoValidBodyLength($title, $content, $expectedException)
    {
        $this->expectException($expectedException);
        $result = new Post($title, $content, true, $this->user);
    }

    public function shouldThrowExceptionIfNoValidContentLengthDataProvider()
    {
        return [
            'no content' => ['Valid title', '', 'Blog\Domain\Exception\InvalidBodyLengthException']
        ];
    }
    
    /** @test */
    /*public function shouldThrowExceptionIfAPostDontHaveUser()
    {
        $this->expectException('Blog\Domain\Exception\UserNoExistException');
        $result = new Post(self::VALID_TITLE, self::VALID_CONTENT, true, $this->user);

    }*/
}