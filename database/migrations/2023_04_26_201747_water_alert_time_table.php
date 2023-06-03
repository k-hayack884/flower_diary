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
        Schema::create('water_alert_times', function (Blueprint $table) {
//            $table->id();
            $table->uuid('alert_time_id')->primary();
            $table->uuid('water_setting_id');
            $table->string('alert_time');
            $table->dateTime('resent_care_time')->nullable();
            $table->timestamps();
            $table->foreign('water_setting_id')
                ->references('water_setting_id')
                ->on('water_settings')
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
        Schema::dropIfExists('water_alert_times');
    }
};
