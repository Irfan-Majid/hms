<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inpatienttest extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function inpatienttestdetail(){
        return $this->hasMany(Inpatienttestdetail::class);
    }

    public function in_patient(){
        return $this->belongsTo(InPatient::class,'in_patient_id','id');
    }
}
