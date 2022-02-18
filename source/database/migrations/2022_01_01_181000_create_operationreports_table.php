<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationreports', function (Blueprint $table) {
            $table->id();
            $table->string('cc');
            $table->string('investigation');
            $table->unsignedBigInteger('operationschedule_id');
            $table->foreign('operationschedule_id')->references('id')->on('operationschedules')->onDelete('cascade');
            $table->string('advice');
            $table->string('nxt_visit');
            $table->integer('status')->default(1);
            $table->string('note');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->longText('remarks'); 
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
        Schema::dropIfExists('operationreports');
    }
}
