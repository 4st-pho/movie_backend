<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room\Room;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
