<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Articles extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'articleservice';
    }
}
