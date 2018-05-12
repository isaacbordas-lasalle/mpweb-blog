<?php

namespace Blog\Application\CommandHandler;

use Blog\Application\Command\CreatePostCommand;
use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Domain\Repository\UserRepository;
use Blog\Framework\Post\Event\PostCreatedEvent;
use Blog\Framework\Post\Event\PostEvent;
use Blog\Domain\Exception\{InvalidTitleLengthException, PostExistsException, InvalidBodyLengthException, UserNoExistException};

class CreatePostHandler
{
    private $postRepository;
    private $userRepository;
    private $eventQueue;

    public function __construct(PostRepository $postRepository, UserRepository $userRepository, PostCreatedEvent $eventQueue)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
        $this->eventQueue = $eventQueue;
    }

    public function handle(CreatePostCommand $command): Post
    {
        $search_post = $this->postRepository->findByTitle($command->title());
        if ($search_post) throw new PostExistsException;

        $user = $this->userRepository->findById($command->userId());
        if (!$user) throw new UserNoExistException;

        $post = new Post($command->title(), $command->body(), $command->publish(), $user);

        try {
            $this->postRepository->save($post);
            if ($command->publish() === true) $this->eventQueue->onPostCreate(new PostEvent($post));
        } catch (InvalidTitleLengthException $e) {

        } catch (InvalidBodyLengthException $e) {

        }

        return $post;
    }
}