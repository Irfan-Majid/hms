<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('out_patient_id')->unsigned()->nullable();
			$table->foreign('out_patient_id')->references('id')->on('out_patients')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
