<?php

use Faker\Generator as Faker;


$category = [
    '苏打水', '红茶', '绿茶', '功能饮料', '柠檬汽水', '碳酸饮料', '柠檬汁', '凉茶', '乌龙茶', '乳饮料'
];


$factory->define( App\Categories::class, function (Faker $faker) use ($category) {
    static $i=0;
    $categoryName = $category[ $i ];
    $i++;
    return [
        'name' => $categoryName
    ];
} );
