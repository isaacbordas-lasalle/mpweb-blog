<?php

namespace Blog\Application\Command;

class CreateUserCommand
{
    private $email;
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function email() : string
    {
        return $this->email;
    }

    public function password() : string
    {
        return $this->password;
    }

}