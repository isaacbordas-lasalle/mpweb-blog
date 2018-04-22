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
     * @test
     * @dataProvider shouldPersistUserDataProvider
     */
    public function shouldPersistUser($email, $password)
    {
        $result = new User($email, $password);
        $this->assertObjectHasAttribute('email', $result);
    }

    public function shouldPersistUserDataProvider()
    {
        return [
            'password and email ok' => ['aaa@aa.es', 'dg4gghfdfsdf5ddf']
        ];
    }

    /**
     * @test
     * @dataProvider shouldNotPersistUserDataProvider
     */
    public function shouldNotPersistUser($email, $password, $expectedException)
    {
        $this->expectException($expectedException);
        $result = new User($email, $password);
    }

    public function shouldNotPersistUserDataProvider()
    {
        return [
            'password invalid format' => ['aaa@aaa.es', 'aaaa', 'Blog\Domain\Exception\InvalidPasswordFormatException'],
            'password invalid length' => [0, 1, 'Blog\Domain\Exception\InvalidEmailFormatException'],
            'email invalid format' => ['ddd', 'dg4gghfdfsdf5ddf', 'Blog\Domain\Exception\InvalidEmailFormatException']
        ];
    }
}