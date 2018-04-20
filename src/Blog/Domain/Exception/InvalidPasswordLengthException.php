<?php

namespace Blog\Domain\Exception;

class InvalidPasswordLengthException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Invalid password length');
    }
}