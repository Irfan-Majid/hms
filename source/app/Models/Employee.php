<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="employees";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->hasOne(Employee::class);
    }
}
