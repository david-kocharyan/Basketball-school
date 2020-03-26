<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('player_id');
            $table->string('team');
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('month_players');
    }
}
