<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInpatienttestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpatienttestdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inpatienttest_id');
            $table->foreign('inpatienttest_id')->references('id')->on('inpatienttests')->onDelete('cascade');
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
        Schema::dropIfExists('inpatienttestdetails');
    }
}
