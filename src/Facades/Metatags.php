<?php

namespace mobiosolutions\metatags\Facades;

use Illuminate\Support\Facades\Facade;
class MetatagsFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'Metatags';
    }
}