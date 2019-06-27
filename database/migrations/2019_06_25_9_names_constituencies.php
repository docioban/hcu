<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NamesConstituencies extends Migration
{
    /**
     * Run the migrations.
     *'o
     * @return void
     */
    public function up()
    {
        Schema::create('names_constituencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('constituencies_id');

            $table->foreign('language_id')->references('id')->on('language');
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
        Schema::dropIfExists('names_constituencies');
    }
}
