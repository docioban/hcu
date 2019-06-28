<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DistrictConstituencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_constituencies', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('constituency_id');

            $table->foreign('district_id')->references('id')->on('district');
            $table->foreign('constituency_id')->references('id')->on('constituencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_constituencies');
    }
}
