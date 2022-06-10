<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface UserProfileRepositoryInterface
{
  function getPersonalProfile($id): Collection;
  function getSocialMediaProfile($id): Collection;
  function updateUserProfile($data, $user_id): bool;
}
