<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LanguageConstituencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_constituencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('constituency_id');
            $table->string('language');
            $table->string('name');
            $table->timestamps();

            //$table->foreign('constituency_id')->references('constituency_name')->on('constituencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_constituencies');
    }
}
