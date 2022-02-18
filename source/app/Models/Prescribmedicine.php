<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescribmedicine extends Model
{
    use HasFactory;

    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }
}
