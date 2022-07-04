<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SettingServiceInterface
{
    public function update(Request $request): void;
    public function hasMenu(): bool;
    public function menus();
    public function resetMenus(): void;
    public function identities(): array;
}
