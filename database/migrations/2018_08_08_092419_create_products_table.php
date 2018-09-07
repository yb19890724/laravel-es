<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'products', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->integer( 'category_id' );
            $table->string( 'name', 10 );
            $table->decimal( 'price', 8, 2 );
            $table->string( 'description', 255 );
            $table->string( 'avatar', 255 );
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
        Schema::dropIfExists( 'products' );
    }
}
