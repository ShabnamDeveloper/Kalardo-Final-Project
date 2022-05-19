<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('store_name');
            $table->string('store_owner')->nullable();
            $table->string('store_phone');
            $table->string('store_phone2')->nullable();
            $table->string('store_image')->nullable();
            $table->text('address');
            $table->string('email')->nullable();
            $table->string('open_time')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('limit_admin')->default(20);
            $table->tinyInteger('review_guest')->default(1);
            $table->string('store_logo')->nullable();
            $table->string('store_icon')->nullable();
            $table->string('maintenance')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
