<?php

namespace Blog\Framework\Post\Queue\Producer;

use Blog\Domain\Post;
use Blog\Domain\Exception\PostNotExistsException;

class CreatePostProducer
{
    private $producer;

    public function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    public function add(Post $post)
    {
        if(empty($post->getId())) {
            throw new PostNotExistsException;
        }

        $message = [
            'postId' => $post->getId(),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $this->producer->publish(json_encode($message));
    }
}