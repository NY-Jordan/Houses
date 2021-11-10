<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public static function getAll()
    {
        return History::all();
    }
    public function post()
    {
        return $this->belongsTo(History::class);
    }
    
}
