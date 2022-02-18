<?php

use App\Models\Medicinedetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinedetails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('medicinegeneric_id');
            $table->foreign('medicinegeneric_id')->references('id')->on('medicinegenerics')->onDelete('cascade');
            $table->unsignedBigInteger('medicinebrand_id');
            $table->foreign('medicinebrand_id')->references('id')->on('medicinebrands')->onDelete('cascade');
            $table->double('purchase_price',12,2);
            $table->double('sale_price',12,2);
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
        Schema::dropIfExists('medicinedetails');
    }
}
