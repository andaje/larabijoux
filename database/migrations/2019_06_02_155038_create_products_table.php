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
        Schema::create('products',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->nullable();
            $table->integer('category_id');
            $table->string('name', 191)->unique();
            $table->string('title', 140);
            $table->string('description', 500);
            $table->decimal('price')->unsigned();
            $table->integer('quantity')->unsigned();
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
