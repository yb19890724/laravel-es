<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Es\Index\ShopIndexConfigurator;

class Shop extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $indexConfigurator = ShopIndexConfigurator::class;

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
        'properties' => [
            'name'     => [
                'type' => 'text',
            ],
            'address'  => [
                'type' => 'text'
            ],
            "location" => [
                "type" => "geo_point"
            ]
        ]
    ];

    public function searchableAs()
    {
        return 'shops';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array[ 'location' ] = array_only( $array, [ 'lat', 'lon' ] );

        return array_except( $array, [ 'lat', 'lon' ] );
    }
}