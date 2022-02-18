<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatienttestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patienttests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('out_patient_id')->unsigned()->nullable();
			$table->foreign('out_patient_id')->references('id')->on('out_patients')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->double('vat',8,2)->comment('this is a % value');
            $table->double('discount',8,2)->comment('this is a % value');
            $table->double('grand_total',8,2);
            $table->double('paid',8,2);
            $table->integer('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('patienttests');
    }
}
