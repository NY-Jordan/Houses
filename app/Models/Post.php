<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Cities;
use App\Models\History;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function city()
    {
        return $this->belongsTo(Cities::class);
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }

    public static function getAll()
    {
        return Post::all()->sortByDesc('id');
    }

    public static function posts_by_user()
    {
        return $posts = Post::where('user_id', Auth::user()->id);
    }
    public function User()
    {
        return $this->hasOne(User::class);
    }
    public static function load_post(Post $value)
    {
        return "      
        <div class='col-md-3'>
            <div class='card border-0'>
            <a href='/property/$value->id/details'>
                <img src=' Storage::url($ $value->image->path) '
                    style='width:240px; height:200px;' class='card-img-top'>
            </a>
            <div class='card-body row'>
                <div class='col'>
                    <p class='text-uppercase fw-bolder'> $value->name </p>
                    <p class='text-muted'><span
                            class='fw-bolder'> $value->rent_per_month </span>FCFA /
                        Month</p>
                </div>
                <div class='col'>
                    <p class='text-end'><span
                            class='badge bg-info'> $value->location </span></p>
                </div>
            </div>
           </div>
        </div>
        ";
    }
}

