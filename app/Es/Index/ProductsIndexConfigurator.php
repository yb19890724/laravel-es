<?php

namespace App\Es\Index;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ProductsIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = "products";
    /**
     * @var array
     */
    protected $settings = [
        //
        "number_of_shards"   => 10,
        "number_of_replicas" => 1,
    ];
}