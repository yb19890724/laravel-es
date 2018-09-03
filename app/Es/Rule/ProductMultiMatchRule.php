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
        return [
            "must" => [
                "term" => [
                    "name" => $this->builder->query
                ]
            ]
        ];
    }
}