<?php

namespace App\Repositories;

use App\Interfaces\SettingRespositoryInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository implements SettingRespositoryInterface
{
    function getSettings(): Collection
    {
        return Setting::all();
    }

    function updateSetting($data): bool
    {
        $validData = collect($data)->unique();
        foreach ($validData as $key => $value) {
            Setting::where('key', $key)->update([
                'value' => $value
            ]);
        }
        return true;
    }
}
