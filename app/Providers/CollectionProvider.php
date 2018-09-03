<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class CollectionProvider extends ServiceProvider
{


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->elasticPaginateRawData();

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function elasticPaginateRawData()
    {
        Collection::macro( 'esFormat', function () {

            $record = [];
            foreach ($this->all()[ 'hits' ][ 'hits' ] as $key => $value) {

                $record[ $key ]=$value['_source'];
                $record[ $key ][ 'highlight' ] = isset( $value[ 'highlight' ] ) ? $value[ 'highlight' ][key( $value[ 'highlight' ] )][ 0 ] : '';

            }
             return $record;
        } );
    }
}
