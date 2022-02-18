<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicinedetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="medicinedetails";
    // protected $fillable = [
    //     'image',
    //     'name',
    //     'description',
    //     'medicinebrand_id',
    //     'medicinegeneric_id',
    //     'purchase_price',
    //     'sale_price'];
    public $timestamps = false;
    public function medicinebrand(){
        return $this->belongsTo(Medicinebrand::class);
    }

    public function medicinegeneric(){
        return $this->belongsTo(Medicinegeneric::class);
    }

    
}
