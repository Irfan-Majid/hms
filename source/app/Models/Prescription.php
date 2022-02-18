<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    public function appointment(){
        return $this->belongsTo(Appointement::class);
    } 
    
    public function prescribmedicine(){
        return $this->hasMany(Prescribmedicine::class);
    }
}
