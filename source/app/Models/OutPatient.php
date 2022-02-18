<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OutPatient extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="out_patients";

    public function appointment(){
        return $this->hasOne(Appointement::class);
    }

    public function patienttest(){
        return $this->hasOne(Patienttest::class);
    }
}
