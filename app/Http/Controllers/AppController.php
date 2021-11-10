<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $categories  = Categories::getAll();
        $posts = Post::getAll()->take(8);
        $cities  = Cities::getAll();
        return view('index',[
            'categories' => $categories,
            'posts' => $posts,
            'cities' => $cities
        ]);
    }
    public function by_category($id)
    {
        $cities  = Cities::getAll();
        $categories = Categories::getAll();
        if ($id > count($categories) || $id < 0) {
            abort('404');
        }
        $res = Post::where('category_id', $id);
        $posts = $this->paginate($res, 6);
        $category = Categories::where('id', $id)->first();
        return view('by_category', [
            'posts' => $posts,
            'cities' => $cities,
            'cate' => $category,
            'categories' => $categories
        ]);
    }

    public function by_city(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);
        $citiesId  = $request->city;
        $cities  = Cities::getAll();
        $resultat = [];
        $categories = Categories::getAll();
        $cities_search = [];
        foreach ($citiesId as $value) {
            $resultat = Cities::where('id', $value)->first();
            if (in_array($resultat, $cities_search)) {
                
            } else {
                $cities_search[] = $resultat;
            }

            if ($value > count($cities)) {
                abort('404');
            }
            
        }
        if (!empty($cities)) {
            $res = Post::where('city_id', $citiesId[0]);
            for ($i=0; $i < count($citiesId) ; $i++) {
                $a = $res->orWhere('city_id', $citiesId[$i]);
            }
            $posts = $this->paginate($a, 8);
    
        } 

        return view('by_cities', [
            'posts' => $posts,
            'cities' => $cities,
            'cities_search' => $cities_search,
            'categories' => $categories
        ]);
    }

    public function by_price(Request $request)
    {
        $request->validate([
            'price' => 'required'
        ]);
        $cities  = Cities::getAll();
        $categories = Categories::getAll();
        $price = $request->price;
        $res = Post::where('rent_per_month', '<=', $price);
        $posts = $this->paginate($res, 8);
        return view('by_price', [
            'posts' => $posts,
            'cities' => $cities,
            'price' => $price,
            'categories' => $categories
        ]);
    }

    public function result()
    {
        $categories  = Categories::getAll();
        return view('result', [
            'categories' => $categories,
        ]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'category_id' => 'required',
            'budget' => 'required'
        ]);

        $location = $request->location;
        $cities  = Cities::getAll();
        $categories  = Categories::getAll();
        $category_id = (int)$request->input('category_id');
        if ($category_id > count($categories) || $category_id < 0) {
            abort('404');
        }
        $budget = (int)$request->input('budget');
        $search  = Post::where('category_id', $category_id)->where('location', $location)->where('rent_per_month', '<=', $budget);
        $posts = $this->paginate($search, 8);
        $categry = Categories::where('id', $category_id)->first();
        return view('result', [
            'posts' => $posts,
            'cities' => $cities,
            'categories' => $categories,
            'categry' => $categry,
            'location' => $location
        ]);
    }
    public function paginate($request, int $bypage)
    {
        return $request->paginate($bypage);
    }

}