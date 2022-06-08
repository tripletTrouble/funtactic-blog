<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface SettingRespositoryInterface
{
  function getSettings(): Collection;
  function updateSetting($data): bool;
}
