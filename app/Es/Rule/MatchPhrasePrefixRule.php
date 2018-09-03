<?php

namespace App\Es\Rule;

use ScoutElastic\SearchRule;

class MatchPhrasePrefixRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        //
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            "must" => [
                "match_phrase_prefix" => [
                    "name" => [
                        "query"          => $this->builder->query,
                        "max_expansions" => 5
                    ]
                ]
            ]
        ];
    }
}