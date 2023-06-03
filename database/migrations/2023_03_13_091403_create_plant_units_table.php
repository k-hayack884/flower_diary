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
        Schema::create('plant_units', function (Blueprint $table) {
            $table->uuid(('plant_unit_id'))->primary();
            $table->uuid(('user_id'));
            $table->uuid(('plant_id'));
            $table->uuid(('check_seat_id'));
            $table->uuid(('plant_name'));
            $table->string('plant_image');
            $table->string(('create_date'));
            $table->string(('diary_update_date'));
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
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
        Schema::dropIfExists('plant_units');

    }
};
