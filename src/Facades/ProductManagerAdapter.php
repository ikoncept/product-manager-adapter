<?php

namespace Ikoncept\ProductManagerAdapter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ikoncept\ProductManagerAdapter\ProductManagerAdapter
 */
class ProductManagerAdapter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ikoncept\ProductManagerAdapter\ProductManagerAdapter::class;
    }
}
