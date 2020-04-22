<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tournament');
            $table->unsignedBigInteger('center_id');
            $table->string('best_player')->nullable();
            $table->integer('pts')->nullable();
            $table->integer('rb')->nullable();
            $table->integer('ast')->nullable();
            $table->string('type');
            $table->date('date');
            $table->time('time');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
