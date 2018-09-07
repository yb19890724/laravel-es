<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('laraveles', function () {

    $this->call("elastic:create-index",[
        "index-configurator"=>"App\\Es\\Index\\ShopIndexConfigurator"
    ]);
    $this->call("elastic:create-index",[
        "index-configurator"=>"App\\Es\\Index\\CategoryIndexConfigurator"
    ]);
    $this->call("elastic:create-index",[
        "index-configurator"=>"App\\Es\\Index\\ProductIndexConfigurator"
    ]);
    $this->call("migrate");
    $this->call("db:seed");

});
