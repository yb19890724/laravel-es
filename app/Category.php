<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Es\Index\CategoryIndexConfigurator;
use App\Es\Rule\NameSearchRule;

class Category extends Model
{
    use Searchable;

    protected $fillable = [

    ];

    /**
     * @var string
     */
    protected $indexConfigurator = CategoryIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [//全局搜索方法
        NameSearchRule::class
    ];

    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
            'name' => [
                'type'            => 'text',
                /*'analyzer'      => 'ik_max_word',//设置分词
                'search_analyzer' => 'ik_max_word',*/
                'boost'           => 3,//提高权重
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                    ]
                ]
            ]
        ]
    ];

    public function searchableAs()
    {
        return 'categories';
    }

}
