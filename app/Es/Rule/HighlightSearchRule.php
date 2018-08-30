<?php

namespace App\Es\Rule;

use ScoutElastic\SearchRule;

class HighlightSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        //
        return [
            'fields' => [
                'name' => [
                    'type' => 'plain'
                ]
            ]
        ];
    }

    /**
     * 这里是检索条件 默认是全文搜索 如果你想用 全文搜索请注释这里
     * @inheritdoc
     */
    /*public function buildQueryPayload()
    {
        dd($this->builder->query);

    }*/
}