<?php

namespace domain\Facades;

use domain\Services\AuthService;
use Illuminate\Support\Facades\Facade;

class AuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AuthService::class;
    }
}
