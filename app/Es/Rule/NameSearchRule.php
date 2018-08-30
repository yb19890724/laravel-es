<?php

namespace App\Es\Rule;

use ScoutElastic\SearchRule;

class NameSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    /*public function buildHighlightPayload()
    {
        //
    }*/

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