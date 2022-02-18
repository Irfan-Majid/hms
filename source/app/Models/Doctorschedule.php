<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctorschedule extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['doctor_id','weekday_id','dutyshift_id','status','created_by','updated_by'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function dutyshift(){
        return $this->belongsTo(Dutyshift::class);
    }
    
    public function weekday(){
        return $this->belongsTo(Weekday::class);
    }
   

}
