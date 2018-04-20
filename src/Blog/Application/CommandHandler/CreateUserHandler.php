<?php

namespace Blog\Application\CommandHandler;

use Blog\Application\Command\CreateUserCommand;
use Blog\Domain\User;
use Blog\Domain\Repository\UserRepository;
use Blog\Domain\Exception\{InvalidEmailLengthException, InvalidPasswordFormatException, InvalidPasswordLengthException};

class CreateUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserCommand $command): User
    {

        $user = new User($command->email(), $command->password());

        try {
            $this->userRepository->save($user);
        } catch (InvalidEmailLengthException $e) {

        } catch (InvalidPasswordFormatException $e) {

        } catch (InvalidPasswordLengthException $e) {

        }

        return $user;
    }
}