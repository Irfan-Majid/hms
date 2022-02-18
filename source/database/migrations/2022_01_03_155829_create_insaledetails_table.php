<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsaledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insaledetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insale_id');
            $table->foreign('insale_id')->references('id')->on('insales')->onDelete('cascade');
			$table->unsignedBigInteger('medicinedetail_id');
            $table->foreign('medicinedetail_id')->references('id')->on('medicinedetails')->onDelete('cascade');;
			$table->bigInteger('qty');
			$table->double('price',10,2);
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
        Schema::dropIfExists('insaledetails');
    }
}
