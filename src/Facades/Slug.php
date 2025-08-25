<?php

namespace Myol\UniqueSlug\Facades;

use Illuminate\Support\Facades\Facade;

class Slug extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'unique-slug';
    }

}
