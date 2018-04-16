<?php

namespace Blog\Domain\Exception;

class InvalidBodyLengthException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Post body exceeds length');
    }
}