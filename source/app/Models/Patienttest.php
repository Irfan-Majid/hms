<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patienttest extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function patienttestdetail(){
        return $this->hasMany(patienttestdetail::class);
    }

    public function out_patient(){
        return $this->belongsTo(OutPatient::class,'out_patient_id','id');
    }

}
