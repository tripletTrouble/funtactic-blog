<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository
{
    public function updateSettings(array $data): void
    {
        $settings = Setting::all(['key']);

        $unique_data = collect($data)->unique();

        foreach ($unique_data as $key => $value) {
            if ($settings->contains('key', $key)) {
                $setting = Setting::where('key', $key)->first();
                $setting->value = $value;
                $setting->save();
            }
        }
    }

    public function resetMenus(): void
    {
        $menus = Setting::get()->only([4, 5, 6]);

        foreach ($menus as $menu) {
            $menu->value = null;
            $menu->save();
        }
    }

    public function getIndentities(): Collection
    {
        return Setting::get()->only([1, 2, 3]);
    }

    public function getMenus(): Collection
    {
        return Setting::get()->only([4, 5, 6]);
    }
}
