<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inpatienttestdetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function inpatienttest(){
        return $this->belongsTo(Inpatienttest::class);
    }

    public function testname(){
        return $this->belongsTo(Testname::class);
    }
}
