<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LanguageLocality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_locality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('locality_id');
            $table->string('language');
            $table->string('name');
            $table->timestamps();

            $table->foreign('locality_id')->references('id')->on('localities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_locality');
    }
}
