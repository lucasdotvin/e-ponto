<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchInLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_in_logs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('users');

            $table->date('work_day');
            $table->time('work_start_time');
            $table->time('work_end_time');

            $table->unsignedBigInteger('confirmed_by');
            $table->foreign('confirmed_by')->references('id')->on('users');

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
        Schema::dropIfExists('punch_in_logs');
    }
}
