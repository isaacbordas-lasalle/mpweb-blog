<?php

namespace Blog\Application\Command;

class CreatePostCommand
{
    private $title;
    private $body;
    private $publish;
    private $userId;

    public function __construct(string $title, string $body, bool $publish, int $userId)
    {
        $this->title = $title;
        $this->body = $body;
        $this->publish = $publish;
        $this->userId = $userId;
    }

    public function title() : string
    {
        return $this->title;
    }

    public function body() : string
    {
        return $this->body;
    }

    public function publish() : bool
    {
        return $this->publish;
    }

    public function userId() : int
    {
        return $this->userId;
    }

}