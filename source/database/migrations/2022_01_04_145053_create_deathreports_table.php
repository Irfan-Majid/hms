<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deathreports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('in_patient_id')->unsigned()->nullable();
            $table->unsignedBigInteger('doctor_id')->unsigned()->nullable();
            $table->date('death_date');
            $table->longText('description');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('deathreports');
    }
}
