<?php

namespace Blog\Framework\Post\Event;

use Blog\Framework\Post\Queue\Producer\CreatePostProducer;
use Blog\Domain\Exception\PostNotExistsException;

class PostCreatedEvent
{

    private $createPostProducer;

    public function __construct(CreatePostProducer $createPostProducer)
    {
        $this->createPostProducer = $createPostProducer;
    }

    public function onPostCreate(PostEvent $postEvent)
    {
        try {
            $this->createPostProducer->add($postEvent->getPost());
            return true;
        } catch (PostNotExistsException $e) {

        }
    }
}