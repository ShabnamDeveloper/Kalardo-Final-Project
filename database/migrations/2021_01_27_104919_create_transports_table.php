<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    public function up()
    {
        // Schema::create('transports', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->tinyInteger('status');
        //     $table->timestamps();
        // });
        // Schema::create('city_transports',function(Blueprint $table){
        //     $table->unsignedBigInteger('transport_id');
        //     $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
        //     $table->unsignedBigInteger('city_id');
        //     $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        //     $table->string('price')->nullable();
        //     $table->timestamps();
        //     $table->primary(['transport_id','city_id']);
        // });

        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('city_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('price');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });

        Schema::create('city_transport', function (Blueprint $table) {
            $table->unsignedBigInteger('transport_id');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('price_id');
            $table->foreign('price_id')->references('id')->on('city_prices')->onDelete('cascade');
            $table->primary(['transport_id','city_id','price_id']);
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_transport');
        Schema::dropIfExists('city_prices');
        Schema::dropIfExists('transports');
    }
}
