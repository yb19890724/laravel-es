<?php

namespace App\Es\Index;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ShopIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name="shops";

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}