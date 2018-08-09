<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Es\ProductIndexConfigurator;

class Product extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $indexConfigurator = ProductIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        //
        'properties'=>[
            'name'=>[
                'type'=>'text'
            ],
            'description'=>[
                'type'=>'text'
            ],
            'avatar'=>[
                'type'=>'text'
            ]
        ]
    ];

    public function searchableAs()
    {
        return 'products';
    }
}