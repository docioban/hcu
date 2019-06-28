<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Locality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('constituence_id');
            $table->string('name');
            $table->unsignedBigInteger('district_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('district');
            $table->foreign('constituence_id')->references('id')->on('constituencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locality');
    }
}
