<?php

namespace App\Services;

use App\Interfaces\UserProfileServiceInterface;
use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use Throwable;

class UserProfileService implements UserProfileServiceInterface
{
    protected UserProfileRepository $userProfileRepository;

    protected FileService $fileService;

    public function __construct()
    {
        $this->userProfileRepository = new UserProfileRepository();
        $this->fileService = new FileService();
    }

    public function update(Request $request): void
    {
        try {
            $profile_id = $this->userProfileRepository->createOrUpdateUserProfile($request->except(['_token', '_method']));
            $this->fileService->saveOrUpdateUserPhoto($request, $profile_id);
        } catch (Throwable $e) {
            report($e);
        }
    }
}
