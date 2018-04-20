<?php

namespace Blog\Framework\Post\Event;

interface EventQueue
{
    public function publish(PostEvent $post);
}