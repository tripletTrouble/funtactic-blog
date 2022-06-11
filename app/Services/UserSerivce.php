<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserServiceInterface;
use App\Interfaces\UserProfileRepositoryInterface;

class UserSerivce implements UserServiceInterface
{
  private UserProfileRepositoryInterface $userProfileRepository;

  public function __construct(UserProfileRepositoryInterface $userProfileRepository)
  {
    $this->userProfileRepository = $userProfileRepository;
  }

  function getOwnerInfo(array $attribute = []): Collection
  {
    $credential = DB::table('users')->select('name', 'email')->where('id', 1)->first();
    $personalProfile = $this->userProfileRepository->getPersonalProfile(1);
    $socialMediaProfile = $this->userProfileRepository->getSocialMediaProfile(1);
    $ownerInfo = collect($credential)->union($personalProfile)->union($socialMediaProfile);
    if (count($attribute) > 0){
      return $ownerInfo->only($attribute);
    }else {
      return $ownerInfo;
    }
  }
}
