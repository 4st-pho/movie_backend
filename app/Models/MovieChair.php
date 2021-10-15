<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieChair extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'location', 'available', 'coefficient', 'double_chair'];

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
}