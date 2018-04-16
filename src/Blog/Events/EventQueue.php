<?php

namespace Blog\Events;

interface EventQueue
{
    public function publish(PostEvent $post);
}