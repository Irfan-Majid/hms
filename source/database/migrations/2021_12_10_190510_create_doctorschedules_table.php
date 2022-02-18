<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorschedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('weekday_id');
            $table->foreign('weekday_id')->references('id')->on('weekdays')->onDelete('cascade');
            $table->unsignedBigInteger('dutyshift_id');
            $table->foreign('dutyshift_id')->references('id')->on('dutyshifts')->onDelete('cascade');
            $table->integer('status')->default(1)->comment("1=>active,2=>inactive");
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->softDeletes();
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
        Schema::dropIfExists('doctorschedules');
    }
}
