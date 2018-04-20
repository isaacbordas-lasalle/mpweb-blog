<?php

namespace Blog\Domain\Exception;

class InvalidPasswordFormatException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Invalid password format');
    }
}