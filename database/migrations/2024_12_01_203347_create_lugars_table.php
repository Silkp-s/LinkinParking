<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->id();
            $table->string('lugar_matriz');
            $table->integer('posx');
            $table->integer('posy');
            $table->unsignedBigInteger('id_vehiculo')->nullable();
            $table->unsignedBigInteger('id_valors')->nullable();
            $table->boolean('ocupado');
            $table->timestamps();
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos');
            $table->foreign('id_valors')->references('id')->on('valors');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugars');
    }
}