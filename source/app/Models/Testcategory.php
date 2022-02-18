<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testcategory extends Model
{
    use HasFactory;

    public function testname(){
        return $this->hasOne(Testname::class);
    }
}
