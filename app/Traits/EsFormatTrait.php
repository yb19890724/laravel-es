<?php

namespace App\Traits;

use Closure;

trait EsFormatTrait
{
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
}