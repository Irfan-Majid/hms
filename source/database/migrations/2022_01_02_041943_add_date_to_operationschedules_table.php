<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToOperationschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operationschedules', function (Blueprint $table) {
            $table->date('operation_date')->after('operationtype_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operationschedules', function (Blueprint $table) {
            $table->dropColumn('operation_date');
        });
    }
}
