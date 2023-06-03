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
        Schema::create('check_seats', function (Blueprint $table) {
            $table->uuid('check_seat_id')->primary();
            $table->uuid('plant_unit_id');
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
        Schema::dropIfExists('check_seats');
    }
};
