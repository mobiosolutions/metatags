<?php

namespace mobiosolutions\metatags\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * Metatag Facade Class
 * 
 * @category PHP_Class
 * @package  Metatags
 * @author   Nishit Maheta <nishit.maheta@mobiosolutions.com>
 */
class MetatagsFacade extends Facade
{
    /**
     * Facade Accessor for Metatags
     * 
     * @return string 
     */
    protected static function getFacadeAccessor()
    {
        return 'Metatags';
    }
}