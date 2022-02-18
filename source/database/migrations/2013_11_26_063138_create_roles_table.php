<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('type',20)->unique;
            $table->string('identity',30)->unique;
            $table->timestamps();
        });
        DB::table('roles')->insert([
            [
                'type'=>'Superadmin',
                'identity'=>'superadmin',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'Admin',
                'identity'=>'admin',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'Doctor',
                'identity'=>'doctor',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'Patient',
                'identity'=>'patient',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'Nurse',
                'identity'=>'nurse',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'Receptionist',
                'identity'=>'receptionist',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'CaseManager',
                'identity'=>'casemanager',
                'created_at'=>Carbon::now()
            ],
             [
                'type'=>'Laboratorist',
                'identity'=>'laboratorist',
                'created_at'=>Carbon::now()
             ],
            [
                'type'=>'Pharmacist',
                'identity'=>'pharmacist',
                'created_at'=>Carbon::now()
            ] ,
            [
                'type'=>'Accountant',
                'identity'=>'accountant',
                'created_at'=>Carbon::now()
            ],
            [
                'type'=>'General_user',
                'identity'=>'guest',
                'created_at'=>Carbon::now()
            ]
            
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
