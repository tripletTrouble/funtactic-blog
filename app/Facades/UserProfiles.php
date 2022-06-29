<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UserProfiles extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'userprofiles';
    }
}
