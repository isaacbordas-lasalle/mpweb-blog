<?php

namespace Blog\Application;

use Blog\Domain\Post;
use Blog\Domain\Repository\PostRepository;
use Blog\Events\EventQueue;
use Blog\Events\PostEvent;
use Blog\Domain\Exception\{InvalidTitleLengthException, PostExistsException, InvalidBodyLengthException};

class CreatePostUseCase
{
    private $postRepository;
    private $eventQueue;

    public function __construct(PostRepository $postRepository, EventQueue $eventQueue)
    {
        $this->postRepository = $postRepository;
        $this->eventQueue = $eventQueue;
    }

    public function execute(Post $post, $publish = false)
    {
        try {
            $this->postRepository->existsPost($post);
        } catch (PostExistsException $e) {

        }

        try {
            $this->postRepository->save($post);
        } catch (InvalidTitleLengthException $e) {

        } catch (InvalidBodyLengthException $e) {

        }

        if ($publish == true) {
            $this->eventQueue->publish(new PostEvent($post));
        }
    }

}