<?php

namespace App\Traits;

use Closure;

trait EsFormatTrait
{
    /**
     * es search data format
     * @param array $params
     * @param string $closure
     * @return array
     */
    public function esFormatData(array $params, $closure = "")
    {
        $record = [ ];

        foreach ($params[ 'hits' ][ 'hits' ] as $key => $value) {

            $record[ $key ] = $value[ '_source' ];

            if ($closure instanceof Closure) {

                $closure( $record[ $key ], $value );

            }

            $record[ $key ][ 'highlight' ] = isset( $value[ 'highlight' ] ) ? $value[ 'highlight' ][ key( $value[ 'highlight' ] ) ][ 0 ] : '';

        }

        return $record;
    }

    /**
     * es aggs data format
     */
    public function esAggFormatData(array $params, $closure = "")
    {
        $hits = $params[ 'hits' ][ 'hits' ];

        $aggregations = $params[ 'aggregations' ];

        return $closure( $hits, $aggregations );

    }
}