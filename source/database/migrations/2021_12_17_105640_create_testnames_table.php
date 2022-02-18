<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testnames', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descreiption');
            $table->unsignedBigInteger('testcategory_id');
            $table->foreign('testcategory_id')->references('id')->on('testcategories')->onDelete('cascade');
            $table->integer('price');
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
        Schema::dropIfExists('testnames');
    }
}
