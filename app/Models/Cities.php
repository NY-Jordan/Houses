<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cities extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public static  function getAll()
    {
        return Cities::all();
    }
}
