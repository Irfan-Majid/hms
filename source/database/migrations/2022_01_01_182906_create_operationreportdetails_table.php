<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationreportdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationreportdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operationreport_id');
            $table->foreign('operationreport_id')->references('id')->on('operationreports')->onDelete('cascade');
            $table->string('medicine_name');
            $table->string('medicine_type');
            $table->string('medicine_dose');
            $table->string('medicine_note');
            $table->string('medicine_duration');
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
        Schema::dropIfExists('operationreportdetails');
    }
}
