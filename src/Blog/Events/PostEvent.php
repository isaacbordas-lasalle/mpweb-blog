<?php

namespace Blog\Events;

use Blog\Domain\Post;

class PostEvent implements Event
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPost()
    {
        return $this->post;
    }
}