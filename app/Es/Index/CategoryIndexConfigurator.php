<?php

namespace App\Es\Index;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;
use App\Es\Index\ProductIndexConfigurator;

class CategoryIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name="categories";

    /**
     * @var array
     */
    protected $settings = [
        "number_of_shards"=>10,
        "number_of_replicas"=>1,
    ];
}