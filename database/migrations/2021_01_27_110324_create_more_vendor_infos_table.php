<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreVendorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_vendor_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('shipping_terms')->nullable();
            $table->string('return_terms')->nullable();
            $table->integer('free_shipping_threshold')->default(0)->nullable();
            $table->integer('near_shipping_price')->default(0)->nullable();
            $table->integer('far_shipping_price')->default(0)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('more_vendor_infos');
    }

}
