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
        Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->string('title')->unabled();
            $table->text('desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('images')->nullable();
            $table->text('category')->nullable();
            $table->text('attr')->nullable();
            $table->text('options')->nullable();
            $table->string('brand')->unabled()->comment('Производитель');
            $table->string('sku')->nullable()->comment('Артикул');
            $table->integer('price')->nullable();
            $table->string('hash', 32)->unique();
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
        Schema::drop('products');
    }
}
