<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Es\Index\ProductsIndexConfigurator;
use App\Es\Rule\HighlightSearchRule;

class Product extends Model
{
    use Searchable;

    protected $fillable = [
        'name', 'category_id'
    ];

    /**
     * @var string
     */
    protected $indexConfigurator = ProductsIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [//全局搜索方法
        HighlightSearchRule::class
    ];

    /**
     * @var array
     */
    protected $mapping = [
        //
        'properties' => [
            'name'        => [
                'type'            => 'text',
                'analyzer'        => 'ik_max_word',//设置分词
                'search_analyzer' => 'ik_max_word',
                'boost'           => 3,//提高权重
            ],
            'description' => [
                'type' => 'text'
            ],
            'avatar'      => [
                'type' => 'text'
            ],
            'category'    => [
                'type'       => 'nested',
                'properties' => [
                    'id'   => [
                        'type' => 'long',
                    ],
                    'name' => [
                        'type' => 'text',
                    ]
                ]
            ],
        ]
    ];

    public function searchableAs()
    {
        return 'products';
    }

    /**
     * es 索引数据结构
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array[ 'category' ] = \App\Categories::select( [ 'id', 'name' ] )->find( $array[ 'category_id' ] );

        return $array;
    }


}