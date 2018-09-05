<?php

use Faker\Generator as Faker;

$location = [
    [//前门
        'name' => '前门',
        'lat'  => '39.900122',
        'lon'  => '116.39789'
    ], [//西单
        'name' => '西单',
        'lat'  => '39.90697',
        'lon'  => '116.374201'
    ], [//王府井
        'name' => '王府井',
        'lat'  => '39.907924',
        'lon'  => '116.411709'
    ], [//天安门西
        'name' => '天安门西',
        'lat'  => '39.907432',
        'lon'  => '116.391249'
    ], [//天安门东
        'name' => '天安门东',
        'lat'  => '39.907564',
        'lon'  => '116.401183'
    ]
];

$factory->define( App\Shop::class, function (Faker $faker) use ($location) {

    static $i = 0;
    $shopAttribute = $location[ $i ];
    $i++;
    $shopAttribute[ 'address' ] = $faker->address();

    return $shopAttribute;

} );
