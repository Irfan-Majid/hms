<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dutyshift extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','start_time','end_time','created_by','updated_by'];
}
