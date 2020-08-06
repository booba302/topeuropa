<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('line');
            $table->string('sku');
            $table->string('ean');
            $table->double('price', 8, 2);
            $table->integer('stock');
            $table->string('title');
            $table->string('desc');
            $table->string('i_1');
            $table->string('i_2');
            $table->string('i_3');
            $table->string('i_4');
            $table->string('i_5');
            $table->string('generic_keyword');
            $table->string('platinum_keyword');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
