<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patienttestdetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function patienttest(){
        return $this->belongsTo(Patienttest::class);
    }

    public function testname(){
        return $this->belongsTo(Testname::class);
    }
}
