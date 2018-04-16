<?php

namespace Blog\Domain;

use Blog\Domain\Exception\{InvalidTitleLengthException, InvalidBodyLengthException};

class Post
{
    private $title;
    private $body;

    public function __construct(string $title, string $body)
    {
        $this->validateTitleLength($title);
        $this->validateBodyLength($body);

        $this->title = $title;
        $this->body = $body;
    }

    private function validateTitleLength(string $title)
    {
        if (strlen($title) > 50) throw InvalidTitleLengthException::empty();
    }

    private function validateBodyLength(string $body)
    {
        if (strlen($body) > 2000) throw InvalidBodyLengthException::empty();
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBody() : string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

}