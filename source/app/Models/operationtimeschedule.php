<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operationtimeschedule extends Model
{
    use HasFactory;
    public function in_patient(){
        return $this->belongsTo(InPatient::class,'in_patient_id','id');
    }

    public function operationtime(){
        return $this->belongsTo(operationtime::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function operationtheatre(){
        return $this->belongsTo(operationtheatre::class);
    }
    public function operationtype(){
        return $this->belongsTo(operationtype::class);
    }
}
