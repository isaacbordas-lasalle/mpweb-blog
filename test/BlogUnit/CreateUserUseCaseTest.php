<?php

namespace BlogUnit;

use Blog\Domain\User;
use PHPUnit\Framework\TestCase;
use Blog\Domain\Repository\UserRepository;

class CreateUserUseCaseTestt extends TestCase
{

    private $userRepository;
    private $user;

    protected function setUp()
    {
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->user = $this->createMock(User::class);

    }
    protected function tearDown()
    {
        $this->user = null;
        $this->userRepository = null;
    }

    /** @test */
    public function shouldPersistAUser()
    {
        //data provider
        $result = new User(self::VALID_TITLE, self::VALID_CONTENT);
        $this->assertObjectHasAttribute('title', $result);
    }
}