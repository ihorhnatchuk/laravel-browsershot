<?php

namespace IhorHnatchuk\Browsershot\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \IhorHnatchuk\Browsershot\Screenshot
 */
class Screenshot extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor()
    {
        return 'browsershot.screenshot';
    }
}
