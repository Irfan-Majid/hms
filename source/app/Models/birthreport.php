<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class birthreport extends Model
{
    use HasFactory;
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function in_patient(){
        return $this->belongsTo(InPatient::class,'in_patient_id','id');
    }
}
