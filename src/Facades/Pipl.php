<?php

namespace Abdelrahman_badr\Pipl\Facades;

use Illuminate\Support\Facades\Facade;

class Pipl extends Facade
{
    protected static function getFacadeAccessor() 
    { 
        return 'Pipl';
     }

}