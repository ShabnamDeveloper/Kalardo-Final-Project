<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->timestamps();
        });

        Schema::create('brand_product_user', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->unsignedBigInteger('product_user_id');
            $table->foreign('product_user_id')->references('id')->on('product_users')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('brand_product_user');
        Schema::dropIfExists('brands');
    }
}
