<?php

namespace Blog\Domain\Exception;

class PostExistsException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Post already exists');
    }
}