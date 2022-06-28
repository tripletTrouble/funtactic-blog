<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository
{
	public function updateIdentities(array $data): void
	{
		$identities = Setting::get()->only([1, 3]);
		$data_keys = array_keys($data);

		foreach ($identities as $key => $indetity){
			$indetity->value = $data[$data_keys[$key]];
			$indetity->save();
		}
	}

	public function updateMenus(array $data): void
	{
		$menus = Setting::get()->only([4, 5, 6, 7]);
		$data_keys = array_keys($data);

		foreach ($menus as $key => $menu){
			$menu->value = $data[$data_keys[$key]];
			$menu->save();
		}
	}

	public function getIndentities(): Collection
	{
		return Setting::get()->only([1, 2, 3]);
	}

	public function getMenus(): Collection
	{
		return Setting::get()->only([4, 5, 6, 7]);
	}
}
