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
        Schema::create('fertilizer_alert_times', function (Blueprint $table) {
//            $table->id();
            $table->uuid('alert_time_id')->primary();
            $table->uuid('fertilizer_setting_id');
            $table->integer('alert_month');
            $table->dateTime('resent_care_time')->nullable();
            $table->timestamps();
            $table->foreign('fertilizer_setting_id')
                ->references('fertilizer_setting_id')
                ->on('fertilizer_settings')
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
        Schema::dropIfExists('fertilizer_alert_times');
    }
};
