<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Interfaces\UserProfileRepositoryInterface;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    private UserProfileRepositoryInterface $userProfileRepository;

    public function __construct(UserProfileRepositoryInterface $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        return view('admin-panel.user-profile', [
            'personalProfile' => $this->userProfileRepository->getPersonalProfile(1),
            'socialMediaProfile' => $this->userProfileRepository->getSocialMediaProfile(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->userProfileRepository->updateUserProfile($request->except(['_token', '_method']), 1);
        return redirect()->back()->with('success', 'Profile telah diperbarui');
    }
}
