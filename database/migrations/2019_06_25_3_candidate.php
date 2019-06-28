<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Candidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('party_id')->nullable();
            $table->unsignedBigInteger('constituencies_id');
            $table->string('name');
            $table->string('location');
            $table->string('civil_status');
            $table->string('function');
            $table->string('studies');
            $table->date('date');
            $table->timestamps();

            $table->foreign('party_id')->references('id')->on('party');
            $table->foreign('constituencies_id')->references('id')->on('constituencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate');
    }
}
