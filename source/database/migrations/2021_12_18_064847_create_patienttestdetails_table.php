<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatienttestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patienttestdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patienttest_id');
            $table->foreign('patienttest_id')->references('id')->on('patienttests')->onDelete('cascade');
            $table->unsignedBigInteger('testname_id');
            $table->foreign('testname_id')->references('id')->on('testnames')->onDelete('cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('patienttestdetails');
    }
}
