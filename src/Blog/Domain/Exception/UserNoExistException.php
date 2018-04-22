<?php

namespace Blog\Domain\Exception;

class UserNoExistException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('User don\'t exist');
    }
}