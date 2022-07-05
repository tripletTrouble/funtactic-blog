<?php

namespace App\Http\Controllers;

use App\Facades\UserProfiles;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin-panel.user-profile', [
            'profiles' => Auth::user()->profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        UserProfiles::update($request);

        return redirect()->back()->with('success', 'Profile telah diperbarui');
    }
}
