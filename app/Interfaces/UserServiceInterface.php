<?php

namespace App\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function find(int $id): User;
}
