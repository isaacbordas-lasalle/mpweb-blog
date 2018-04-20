<?php

namespace Blog\Domain\Exception;

class InvalidEmailLengthException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Email is mandatory');
    }
}