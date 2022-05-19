<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featureds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('location');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('featured_product', function (Blueprint $table) {
            $table->unsignedBigInteger('featured_id');
            $table->foreign('featured_id')->references('id')->on('featureds')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('featured_product');
        Schema::dropIfExists('featureds');
    }
}
