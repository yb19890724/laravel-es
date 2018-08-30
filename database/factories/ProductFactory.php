<?php

use Faker\Generator as Faker;


$product = [
    '可乐', '雪碧', '奶茶', '咖啡', '格瓦斯', '美年达', '健力宝', '娃哈哈AD钙奶', '红牛', '鬼爪',
    '旺仔牛奶', '脉动', '佳得乐', '乐虎', '亚利桑那冰茶', '统一冰红茶', '康师傅绿茶', '酸梅汤',
    '东方树叶', '维他柠檬茶'
];


$factory->define( App\Product::class, function (Faker $faker) use ($product) {

    static $i = 0;
    $categoryId = App\Categories::pluck( 'id' )->random();
    $productName=$product[$i];
    $i++;

    return [
        'name'        => $productName,
        'description' => $faker->catchPhrase(),
        'avatar'      => $faker->imageUrl(),
        'category_id' => $categoryId,
    ];

} );
