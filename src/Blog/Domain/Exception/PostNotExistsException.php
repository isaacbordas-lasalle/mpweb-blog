<?php


namespace Blog\Domain\Exception;


class PostNotExistsException extends InvalidArgumentException
{
    public static function empty()
    {
        return new static('Post don\'t exists');
    }
}