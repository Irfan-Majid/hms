<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;
    public function out_patient(){
        return $this->belongsTo(OutPatient::class,'out_patient_id','id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function prescription(){
        return $this->hasOne(Prescription::class);
    }
}
