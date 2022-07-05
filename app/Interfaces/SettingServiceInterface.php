<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SettingServiceInterface
{
    public function update(Request $request): void;

    public function hasMenu(): bool;

    public function menus(): Collection;

    public function resetMenus(): void;

    public function identities(): array;
}
