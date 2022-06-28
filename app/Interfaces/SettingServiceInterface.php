<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface SettingServiceInterface
{
    public function update(Request $request): void;
    public function menus(): array;
    public function identities(): array;
}
