<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'shops', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'name', 10 );
            $table->string( 'address', 255 );
            $table->double( 'lat', 9, 6 );
            $table->double( 'lon', 9, 6 );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'shops' );
    }
}
