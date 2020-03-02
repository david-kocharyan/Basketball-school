<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('image')->nullable();
            $table->string('dob');
            $table->string('phone_number');
            $table->string('emergency_name')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->enum('gender', array(1,0))->default(1);
            $table->integer('height')->nullable();
            $table->string('nationality');
            $table->integer('jersey_number')->nullable();
            $table->integer('jersey_size')->nullable();
            $table->string('position')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('players');
    }
}
