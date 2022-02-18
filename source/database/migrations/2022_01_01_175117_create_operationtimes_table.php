<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationtimes', function (Blueprint $table) {
            $table->id();
            $table->string('start_time');
            $table->string('end_time');
            $table->string('note')->nullable();
            $table->integer('status')->default(1)->comment("1=>active,2=>inactive");
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
        Schema::dropIfExists('operationtimes');
    }
}
