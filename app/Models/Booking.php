<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = false;
    public function room()
    {
        return $this->hasOne(Room::class,'id','room_id');
    }
}
