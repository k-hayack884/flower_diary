<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific');
            $table->string('information', 1000);
            $table->tinyInteger('recommendSpringWaterInterval');
            $table->tinyInteger('recommendSpringWaterTimes');
            $table->tinyInteger('recommendSummerWaterInterval');
            $table->tinyInteger('recommendSummerWaterTimes');
            $table->tinyInteger('recommendAutumnWaterInterval');
            $table->tinyInteger('recommendAutumnWaterTimes');
            $table->tinyInteger('recommendWinterWaterInterval');
            $table->tinyInteger('recommendWinterWaterTimes');
            $table->string('fertilizerName');
            $table->json('fertilizerMonths');
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
        Schema::dropIfExists('plants');
    }
};
