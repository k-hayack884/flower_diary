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
        Schema::create('fertilizer_settings', function (Blueprint $table) {
//            $table->id();
            $table->uuid('fertilizer_setting_id')->primary();
            $table->uuid('check_seat_id');
            $table->json('months');
            $table->string('fertilizer_note');
            $table->integer('fertilizer_amount');
            $table->string('fertilizer_name');
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

        Schema::dropIfExists('fertilizer_settings');
    }
};
