<?php


namespace Blog\Domain\Exception;


class InvalidEmailFormatException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Invalid Email format');
    }
}