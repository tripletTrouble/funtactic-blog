<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserProfileRepositoryInterface;
use App\Models\UserProfile;

class UserProfileRepository implements UserProfileRepositoryInterface
{
  function getPersonalProfile($id): Collection
  {
    return DB::table('user_profiles')->select('first_name', 'last_name', 'born', 'address', 'interest', 'bio')->where('id', $id)->first();
  }

  function getSocialMediaProfile($id): Collection
  {
    return DB::table('user_profiles')->select('twitter', 'instagram', 'facebook', 'tiktok', 'youtube', 'linkedin', 'github')->where('id', $id)->first();
  }

  function updateUserProfile($data, $user_id): bool
  {
    UserProfile::where('user_id', $user_id)->update($data);
    return true;
  }
}
