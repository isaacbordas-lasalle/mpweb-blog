<?php

namespace Blog\Framework\Post\Queue\Producer;

interface ProducerInterface
{
    public function publish(string $message);
}