<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicinegeneric extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function medecinedetails(){
        return $this->hasMany(Medicinedetails::class);
    }
}
