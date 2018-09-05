<?php

namespace App\Es\Rule;

use ScoutElastic\SearchRule;

class ProductMultiMatchRule extends SearchRule
{

    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'name' => [
                    'type' => 'plain'
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {

        $rules = [ //搜索名称
            'must' => [
                [
                    "match" => [
                        "name" => $this->builder->query
                    ]
                ]
            ]
        ];

        $categoryScreen = [ //分类筛选
            [
                "nested" => [
                    "path"  => "category",
                    "query" => [
                        "match" => [
                            "category.id" => request()->get( 'category_id' )
                        ]
                    ]
                ]
            ]

        ];

        if (request()->get( 'category_id' )) {
            $rules[ 'must' ] = array_merge( $rules[ 'must' ], $categoryScreen );
        }
        return $rules;
    }
}