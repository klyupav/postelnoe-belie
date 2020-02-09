<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function(Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->nullable();
            $table->string('source')->unique();
            $table->string('hash', 32)->unique();
            $table->boolean('parseit')->default(0);
            $table->boolean('available')->default(1);
            $table->text('param')->nullable();
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
        Schema::drop('sources');
    }
}
