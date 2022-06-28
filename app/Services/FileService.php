<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Setting;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class FileService
{
    public function saveOrUpdateArticleImage(Request $request, int $article_id): void
    {
        $article = Article::find($article_id);

        if ($article->thumbnail_image && $request->hasFile('thumbnail_image')) {
            Storage::delete($article->thumbnail_image);
            $article->thumbnail_image = $request->file('thumbnail_image')->store('thumbnail-images');
            $article->save();
        } else if ($request->hasFile('thumbnail_image')) {
            $article->thumbnail_image = $request->file('thumbnail_image')->store('thumbnail-images');
            $article->save();
        }
    }

    public function deleteArticleImage(string $path): void
    {
        Storage::delete($path);
    }

    public function updateSiteLogo(Request $request): void
    {
        $site_logo = Setting::find(2);

        if (Storage::disk('public')->exists($site_logo['value']) && $request->hasFile('site_logo')){
            Storage::delete($site_logo['value']);
            $site_logo->value = $request->file('site_logo')->store('site-logo');
            $site_logo->save();
        }else if ($request->hasFile('site_logo')) {
            $site_logo->value = $request->file('site_logo')->store('site-logo');
            $site_logo->save();
        }
    }

    public function saveOrUpdateUserPhoto (Request $request, int $profile_id): void
    {
        $user_profile = UserProfile::find($profile_id);

        if ($user_profile->profile_photo != null && $request->hasFile('profile_photo')){
            Storage::delete($user_profile->profile_photo);
            $user_profile->profile_photo = $request->file('profile_photo')->store('profile-photos');
            $user_profile->save();
        }else if ($request->hasFile('profile_photo')){
            $user_profile->profile_photo = $request->file('profile_photo')->store('profile-photos');
            $user_profile->save();
        }
    }
}
