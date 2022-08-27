<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $categories  = Categories::getAll();
        $posts = Post::where('status', 'approved')->take(8)->get();
        $cities  = Cities::getAll();
        return view('index',[
            'categories' => $categories,
            'posts' => $posts,
            'cities' => $cities,
            'request' =>  $request
        ]);
    }
    public function by_category($id, Request $request)
    {
        if ($request->show === 'full_time') {
            $res = Post::where('category_id', $request->id);
            $posts = $this->paginate($res, 6);
           $response   = '';
           foreach ($posts as $key => $value) {
                $response  = $response.Post::load_post($value);
           }
           return [
            'response' => $response
           ];
        } else {
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
                'categories' => $categories,
                'request' => $request
            ]);
        }
    }

    public function by_city(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);
        if ($request->show === 'full_time') {
            $res = $this->paginate(Post::where('city_id', $request->city), 8);
            $response  = '';
            foreach ($res as $key => $value) {
                $response  = $response.Post::load_post($value);
            }
            return [
                'response' => $response
            ];
        } else {
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
            $res = Post::where('status', 'approved')->where('city_id', $citiesId[0]);
            for ($i=0; $i < count($citiesId) ; $i++) {
                $a = $res->orWhere('city_id', $citiesId[$i]);
            }
            $posts = $this->paginate($a, 8);
    
        } 

        return view('by_cities', [
            'posts' => $posts,
            'cities' => $cities,
            'cities_search' => $cities_search,
            'categories' => $categories,
            'request' => $request
        ]);

        }
    }

    public function by_price(Request $request)
    {
        
        $request->validate([
            'price' => 'required'
        ]);
        if ($request->show === 'full_time') {
            $cities  = Cities::getAll();
            $categories = Categories::getAll();
            $price = (int)$request->price;
            $res = $this->paginate(Post::where('rent_per_month', '<=', $price), 8);
            $response = "";
            foreach ($res as $key => $value) {
                $response  = $response. Post::load_post($value);
            }
            return [
                'response' => $response
            ];
        } else {
            
           
            $cities  = Cities::getAll();
            $categories = Categories::getAll();
            $price = $request->price;
            $res = Post::where('rent_per_month', '<=', $price);
            $posts = $this->paginate($res, 8);
            return view('by_price', [
                'posts' => $posts,
                'cities' => $cities,
                'price' => $price,
                'categories' => $categories,
                'request' => $request
            ]);  
        }
       
    }

    public function result(Request $request)
    {
        $categories  = Categories::getAll();
        return view('result', [
            'categories' => $categories,
            'request' => $request
        ]);
    }
    public function search(Request $request)
    {
        
        $location = $request->location;
        $cities  = Cities::getAll();
        $categories  = Categories::getAll();
        $category_id = (int)$request->input('category_id');
        $search[] = $request->all();
       $results = Post::all();
        if ($category_id > count($categories) || $category_id < 0) {
            abort('404');
        }
        
        $budget = array_map('intval', explode('-', $request->input('budget')));
        $categry = Categories::where('id', $category_id)->first();
        $search = [];
        foreach ($request->all() as $key => $value) {
            if (!empty($value)) {
                $search['search'][$key] =  $value;
            }
            
        }
        if (empty($search['search'])) {
            return redirect('/')->with('message', 'selectionner au moins un champs');
        } elseif (count($search['search']) === 1) {
            if(isset($search['search']['location'])){
                $result = Post::where('location', $search['search']['location']);
                $results = $this->paginate($result, 8);
            } elseif (isset($search['search']['category_id'])) {
                $result = Post::where('category_id', $search['search']['category_id']);
                $results = $this->paginate($result, 8);
            }elseif (isset($search['search']['rent_per_month'])) {
                $result = Post::where('rent_per_month', '>=', $search['search']['rent_per_month']);
                $results = $this->paginate($result, 8);
            }
        } elseif (count($search['search']) === 2){
            if(isset($search['search']['location'])&&isset($search['search']['category_id'])){
                $result = Post::where('location', $search['search']['location'])->where('category_id', $search['search']['category_id']);
                $results = $this->paginate($result, 8);
            } elseif (isset($search['search']['location'])&&isset($search['search']['budget'])) {
                $result = Post::where('location', $search['search']['location'])->where('rent_per_month', '>=', $search['search']['budget']);
                $results = $this->paginate($result, 8);
            }elseif (isset($search['search']['budget'])&&isset($search['search']['category_id'])) {
                $result = Post::where('rent_per_month', '>=', $search['search']['budget'])->where('category_id', $search['search']['category_id']);
                $results = $this->paginate($result, 8);
            }
        } elseif (count($search['search']) === 3){
            if(isset($search['search']['location'])&&isset($search['search']['category_id'])&&isset($search['search']['budget'])){
                $result = Post::where('location', $search['search']['location'])->where('category_id', $search['search']['category_id'])->where('rent_per_month', '>=', $search['search']['budget']);
                $results = $this->paginate($result, 8);
            }
        }



        /* if (!empty($request->category_id)) {
            $bycategory = Post::where('category_id', $category_id);
        } 
        $posts = $this->paginate($search, 8);
        $categry = Categories::where('id', $category_id)->first();
        */
        return view('result', [
            'posts' => $results,
            'cities' => $cities,
            'categories' => $categories,
            'categry' => $categry,
            'location' => $location,
            'request' => $request
        ]); 
    }
    public function paginate($request, int $bypage)
    {
        return $request->where('status', 'approved')->paginate($bypage);
    }

    

}