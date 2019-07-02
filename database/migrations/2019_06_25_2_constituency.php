<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Constituency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('constituency_id');
            $table->string('name');
            $table->string('slug')->nullable()->index();
            $table->bigInteger('number_of_voters')->nullable();
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
        Schema::dropIfExists('constituencies');
    }
}
