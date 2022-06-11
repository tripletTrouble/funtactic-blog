<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserProfileRepositoryInterface;
use App\Models\UserProfile;
use stdClass;

class UserProfileRepository implements UserProfileRepositoryInterface
{
    function getPersonalProfile($id): stdClass
    {
        return DB::table('user_profiles')->select('first_name', 'last_name', DB::raw('concat(first_name, " ", last_name) as full_name'), 'born', 'address', 'interest', 'bio')->where('user_id', $id)->first();
    }

    function getSocialMediaProfile($id): stdClass
    {
        return DB::table('user_profiles')->select('twitter', 'instagram', 'facebook', 'tiktok', 'youtube', 'linkedin', 'github')->where('user_id', $id)->first();
    }

    function updateUserProfile($data, $user_id): bool
    {
        UserProfile::where('user_id', $user_id)->update($data);
        return true;
    }
}
