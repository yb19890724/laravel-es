<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Es\Index\ProductIndexConfigurator;
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
    protected $indexConfigurator = ProductIndexConfigurator::class;

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
            'price'       => [
                'type' => 'float'
            ],
            'avatar'      => [
                'type' => 'text'
            ],
            'category'    => [
                'type'       => 'nested',
                'properties' => [
                    'id'   => [
                        'type' => 'short',
                    ],
                    'name' => [
                        'type' =>'text',
                        "fields"=>[
                            "raw"=>[
                                "type"=>"keyword"
                            ]
                        ]
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
        $category = \App\Category::select( [ 'id', 'name' ] )->find( $array[ 'category_id' ] );
        $array[ 'category_name' ] = $category[ 'name' ];
        $array[ 'category' ] = $category;

        return $array;
    }


}