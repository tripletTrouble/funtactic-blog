<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserProfileServiceInterface
{
    public function update(Request $request): void;
}
