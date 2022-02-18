<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;
    public function out_patient(){
        return $this->belongsTo(OutPatient::class,'out_patient_id','id');
    }
}
