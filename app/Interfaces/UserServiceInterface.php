<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface UserServiceInterface
{
  function getOwnerInfo(array $attribute = []): Collection;
}
