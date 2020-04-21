<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('album_id');
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('galleries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_galleries');
    }
}
