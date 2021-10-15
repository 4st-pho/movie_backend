<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room\RoomType;
use App\Models\MovieChair;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function chairs(){
        return $this->hasMany('App\Models\MovieChair', 'room_id');
    }
}
