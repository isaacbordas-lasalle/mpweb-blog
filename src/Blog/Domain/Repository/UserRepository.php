<?php

namespace Blog\Domain\Repository;

use Blog\Domain\User;

interface UserRepository
{
    public function save(User $user);
    public function findById($userId);
}