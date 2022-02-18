<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('in_patient_id')->unsigned()->nullable();
			$table->foreign('in_patient_id')->references('id')->on('in_patients')->onDelete('cascade');
            $table->decimal('total_payment',10,2);
			$table->decimal('due',10,2);
            $table->decimal('discount',10,2);
			$table->date('sale_date');
			$table->string('sale_note')->nullable();
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
        Schema::dropIfExists('insales');
    }
}
