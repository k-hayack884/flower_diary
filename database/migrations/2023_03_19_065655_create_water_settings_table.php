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
        Schema::create('water_settings', function (Blueprint $table) {
//            $table->id();
            $table->uuid('water_setting_id')->primary();
            $table->uuid('check_seat_id');
            $table->json('months')->nullable();
            $table->string('water_note');
            $table->string('water_amount');
            $table->integer('watering_times');
            $table->integer('watering_interval');
            $table->json('alert_times')->nullable();
            $table->timestamps();
            $table->foreign('check_seat_id')
                ->references('check_seat_id')
                ->on('check_seats')
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
//        Schema::table('water_alert_times', function (Blueprint $table) {
//            $table->dropForeign('water_alert_times_water_setting_id_foreign');
//        });
        Schema::dropIfExists('water_settings');
    }
};
