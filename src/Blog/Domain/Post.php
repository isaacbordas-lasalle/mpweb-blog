<?php

namespace Blog\Domain;

use Blog\Domain\Exception\{InvalidTitleLengthException, InvalidBodyLengthException};

class Post
{
    private $id;
    private $title;
    private $body;
    private $published;
    private $user;

    public function __construct(string $title, string $body, bool $published = false, User $user)
    {

        $this->title = filter_var($title, FILTER_SANITIZE_STRING);
        $this->body = filter_var($body, FILTER_SANITIZE_STRING);
        $this->published = $published;
        $this->user = $user;

        $this->validateTitleLength($title);
        $this->validateBodyLength($body);
    }

    private function validateTitleLength(string $title)
    {
        if (strlen($title) > 50) throw InvalidTitleLengthException::empty();
    }

    private function validateBodyLength(string $body)
    {
        if (strlen($body) > 2000) throw InvalidBodyLengthException::empty();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getBody() : string
    {
        return $this->body;
    }

    public function setBody(string $body) : void
    {
        $this->body = $body;
    }

    public function getPublished() : bool
    {
        return $this->published;
    }

    public function setPublished(bool $published) : bool
    {
        $this->published = $published;
    }

    public function getUser() : User
    {
        return $this->user;
    }

    public function setUser(User $user) : void
    {
        $this->user = $user;
    }

}