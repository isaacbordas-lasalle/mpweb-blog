<?php

namespace Blog\Domain;

use Blog\Domain\Exception\{InvalidEmailLengthException, InvalidEmailFormatException, InvalidPasswordLengthException, InvalidPasswordFormatException};

class User
{
    private $email;
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->validateEmail($email);
        $this->validatePassword($password);

        $this->email = $email;
        $this->password = $password;
    }

    private function validateEmail(string $email)
    {
        if ($email == '') throw InvalidEmailLengthException::empty();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw InvalidEmailFormatException::empty();
    }

    private function validatePassword(string $password)
    {
        if (strlen($password) > 28 || strlen($password) < 4) throw InvalidPasswordLengthException::empty();
        if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) throw InvalidPasswordFormatException::empty();
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}