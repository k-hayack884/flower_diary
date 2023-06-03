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
        Schema::create('diaries', function (Blueprint $table) {
            $table->uuid('diary_id')->primary();
            $table->uuid('plant_unit_id');
            $table->string('diary_content');
            $table->string('create_date');
            $table->string('image');

            $table->timestamps();
            $table->foreign('plant_unit_id')
                ->references('plant_unit_id')
                ->on('plant_units')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries');
    }
};
