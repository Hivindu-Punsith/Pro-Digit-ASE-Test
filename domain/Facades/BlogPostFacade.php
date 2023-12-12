<?php

namespace domain\Facades;

use domain\Services\BlogPostService;
use Illuminate\Support\Facades\Facade;

class BlogPostFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BlogPostService::class;
    }
}
