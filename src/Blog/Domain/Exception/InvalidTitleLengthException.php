<?php

namespace Blog\Domain\Exception;

class InvalidTitleLengthException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Post title exceeds length');
    }
}