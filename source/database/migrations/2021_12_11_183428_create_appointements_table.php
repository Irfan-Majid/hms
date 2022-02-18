<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('out_patient_id')->unsigned()->nullable();
			$table->foreign('out_patient_id')->references('id')->on('out_patients')->onDelete('cascade');
			$table->unsignedBigInteger('doctor_id')->unsigned()->nullable();
			$table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
			$table->date('appoint_date');
			$table->string('serial');
			$table->text('problem');
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('appointements');
    }
}
