<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',191)->unique();
            $table->timestamps();
            //$table->string('created_at_ip');
            //$table->string('updated_at_ip');
        });
    }
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
