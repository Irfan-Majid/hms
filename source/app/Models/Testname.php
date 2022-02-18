<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testname extends Model
{
    use HasFactory;

    public function testcategory(){
        return $this->belongsTo(Testcategory::class);
    }

    public function patienttestdetail(){
        return $this->hasOne(patienttestdetail::class);
    }
}
