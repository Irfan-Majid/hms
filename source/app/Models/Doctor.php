<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function appointment(){
        return $this->hasMany(Appointement::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function doctorschedule(){
        return $this->hasMany(Doctorschedule::class);
    }
}
