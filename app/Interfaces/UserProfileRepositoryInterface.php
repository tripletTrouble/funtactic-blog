<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use stdClass;

interface UserProfileRepositoryInterface
{
  function getPersonalProfile($id): stdClass;
  function getSocialMediaProfile($id): stdClass;
  function updateUserProfile($data, $user_id): bool;
}
