<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roomtype extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * Get the user associated with the Roomtype
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function room(){
        return $this->hasOne(Room::class);
    }
}
