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

    /**
     * @dataProvider createUserProvider
     */
    public function shouldPersistAUser($email, $password)
    {
        //data provider
        $result = new User($email, $password);
        $this->assertObjectHasAttribute('email', $result);
    }

    public function createUserProvider()
    {
        return [
            ['aaa@aaa.es', 'aaaa'],
            [0, 1]
        ];
    }
}