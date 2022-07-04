<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService implements UserServiceInterface
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function find(int $id): User
    {
        return $this->userRepository->getUser($id);
    }

    public function owner(): User
    {
        return $this->userRepository->getUser(1);
    }
}
