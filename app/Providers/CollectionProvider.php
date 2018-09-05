<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use App\Traits\EsFormatTrait;

class CollectionProvider extends ServiceProvider
{
    use EsFormatTrait;

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
        $trait = $this;
        Collection::macro( 'esFormat', function () use ($trait) {
            return $trait->esFormatData( $this->all() );
        } );
    }

}
