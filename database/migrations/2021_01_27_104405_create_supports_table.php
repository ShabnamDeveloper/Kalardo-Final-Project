<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supportable_id');
            $table->string('supportable_type');
            $table->string('subject')->nullable();
            $table->text('text');
            $table->tinyInteger('part_id');
            $table->tinyInteger('status_id')->default('0');
            $table->integer('parent_id');
            $table->tinyInteger('priority')->nullable();
            $table->integer('approved')->default(0);
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
        Schema::dropIfExists('supports');
    }
}
