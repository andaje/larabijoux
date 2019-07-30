<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{

    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->index()->unsigned();
            $table->string('street');
            $table->string('house_nr');
            $table->string('bus')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}


