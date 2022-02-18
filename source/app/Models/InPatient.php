<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InPatient extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="in_patients";

    // public function appointment(){
    //     return $this->hasOne(Appointement::class);
    // }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
