<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConst extends Model
{
    use HasFactory;
    const CATEGORY_PER_PAGE = 10;
    const FILM_PER_PAGE = 10;
}
