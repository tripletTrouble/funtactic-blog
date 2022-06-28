<?php

namespace App\Repositories;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UserProfileRepository
{
    public function createOrUpdateUserProfile(array $data): int
    {
        if (Auth::user()->userProfile){
            $user_profile = UserProfile::where('user_id', Auth::id())->first();
            $user_profile->first_name = $data['first_name'];
            $user_profile->last_name = $data['last_name'];
            $user_profile->born = $data['born'];
            $user_profile->address = $data['address'];
            $user_profile->interest = $data['interest'];
            $user_profile->bio = $data['bio'];
            $user_profile->twitter = $data['twitter'];
            $user_profile->instagram = $data['instagram'];
            $user_profile->facebook = $data['facebook'];
            $user_profile->tiktok = $data['tiktok'];
            $user_profile->youtube = $data['youtube'];
            $user_profile->linkedin = $data['linkedin'];
            $user_profile->github = $data['github'];
            $user_profile->save();
            return $user_profile->id;
        }else {
            $user_profile = new UserProfile;
            $user_profile->first_name = $data['first_name'];
            $user_profile->last_name = $data['last_name'];
            $user_profile->born = $data['born'];
            $user_profile->address = $data['address'];
            $user_profile->interest = $data['interest'];
            $user_profile->bio = $data['bio'];
            $user_profile->twitter = $data['twitter'];
            $user_profile->instagram = $data['instagram'];
            $user_profile->facebook = $data['facebook'];
            $user_profile->tiktok = $data['tiktok'];
            $user_profile->youtube = $data['youtube'];
            $user_profile->linkedin = $data['linkedin'];
            $user_profile->github = $data['github'];
            $user_profile->save();
            return $user_profile->id;
        }
    }
}
