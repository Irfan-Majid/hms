<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationtimeschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationtimeschedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('in_patient_id')->unsigned()->nullable();
			$table->foreign('in_patient_id')->references('id')->on('in_patients')->onDelete('cascade');
            $table->unsignedBigInteger('operationtime_id');
            $table->foreign('operationtime_id')->references('id')->on('operationtimes')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id')->unsigned()->nullable();
			$table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('operationtheatre_id');
            $table->foreign('operationtheatre_id')->references('id')->on('operationtheatres')->onDelete('cascade');
            $table->unsignedBigInteger('operationtype_id');
            $table->foreign('operationtype_id')->references('id')->on('operationtypes')->onDelete('cascade');
            $table->double('discount',8,2)->nullable();
            $table->double('due',8,2);
            $table->integer('status')->default(1);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('operationtimeschedules');
    }
}
