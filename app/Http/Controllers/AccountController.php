<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Cities;
use App\Models\History;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account(Request $request)
    {
        $posts =  Post::posts_by_user()->get();
        $number = count($posts);
        $categories = Categories::getall();
        $id_category_post = [];
        $number_of_category = 0;
        foreach ($posts as $post) {
            if (in_array($post->category_id, $id_category_post)) {
            } else {
                $id_category_post[] = $post->category_id;
            }
        }
        foreach ($id_category_post as $id) {
            $res = Post::where('category_id', $id)->get();
            if (empty($res)) {
            } else {
                $number_of_category = $number_of_category + 1;
            }
        }

        $histories = History::where('user_id', Auth::user()->id)->get();
        $times = 0;
        $inquiries = 0;
        foreach ($histories as  $item) {
            $times = $times + $item->occurence;
        }
        foreach ($histories as  $item) {
            $inquiries = $inquiries + 1;
        }

        return view('account/index', [
            'posts' => $number,
            'inquiries' => $inquiries,
            'times' => $times,
            'categories' => $number_of_category
        ]);
    }
    public function listed()
    {
        $res = Post::posts_by_user();
        $posts = $this->paginate($res, 6);
        return view('account/listed', [
            'posts' => $posts
        ]);
    }
    public function consulted()
    {

        $historyId = [];
        $histories = History::where('user_id', Auth::user()->id)->get();

        foreach ($histories as  $item) {
            if (in_array($item->post_id, $historyId)) {
                
            } else {
                $historyId[] = $item->post_id;
            }
        }
        if (!empty($historyId)) {
            $res = Post::where('id', $historyId[0]);
            for ($i=1; $i < count($historyId) ; $i++) {
                $a = $res->orWhere('id', $historyId[$i]);
            }

            $posts = $this->paginate($a, 8);
        }

        return view('account/consulted', [
            'posts' => $posts
        ]);
    }
    public function AccountAdd(Request $request)
    {
        if ($request->method() === 'GET') {
            $cities  = Cities::getAll();
            $categories = Categories::all();
            return view('account/add', [
                'categories' => $categories,
                'cities' => $cities
            ]);
        } else {

            $request->validate([
                "category" => ["required"],
                "description" => ["required", "min:20"],
                "name" => ["required"],
                "image" => "required",
                "email" => "required",
                "phonenumber" => "required",
                "rent_per_month" => "required",
                "advance_payment" => "required",
                'location' => "required",
                'city' => "required"
            ]);
            try {
                //enregistrement du post
                $post = new Post();
                $post->category_id = (int)$request->input('category');
                $post->name = $request->input('name');
                $post->description = $request->input("description");
                $post->email = $request->email;
                $post->phonenumber = str_replace(' ', '', $request->input("phonenumber"));
                $post->rent_per_month = (int)$request->rent_per_month;
                $post->advance_payment = (int)$request->advance_payment;
                $post->location = $request->location;
                $post->city_id = (int)$request->city;
                $post->user_id = $request->user()->id;
                //enregistrement de l'image correspondante
                foreach ($request->image as $key => $img) {
                    $filename = 'image' . $request->user()->name . \random_int(0, 1000000);
                    $path = $request->file("image")[$key]->storeAs(
                        'ImagesPost/' . $request->user()->name,
                        $filename,
                        'public'
                    );
                    $image = new Image();
                    $image->path =  $path;
                    $image->post_id = $post->id;
                    $post->save();
                    $post->image()->save($image);
                }
                return \redirect("/property/{$post->id}/details");
            } catch (\Throwable $errors) {
                dd($errors);
            }
        }
    }

    public function details($id)
    {
        $post = Post::find($id);
        $imagesPost = Image::where('post_id', $post->id)->get();
        if (Auth::check()) {
            $name = Auth::user()->name;
            $history = History::where('user_id', Auth::user()->id)->where('post_id', $id)->get();
            if (!isset($history[0])) {
                $history_user = new History();
                $history_user->user_id  =  Auth::user()->id;
                $history_user->post_id = $id;
                $history_user->occurence = 1;
                $history_user->save();
            } else {
                foreach ($history as $item) {
                    if ($item->post_id === (int)$id) {
                        $item->occurence = $item->occurence + 1;
                        $item->save();
                    }
                }
            }
        }
        return \view('account/details', [
            'post' => $post,
            'imagesPost' => $imagesPost
        ]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->method() === 'GET') {
            $post = Post::where('id', $id)->get();
            $categories = Categories::all();
            return view('account/edit', [
                'post' => $post[0],
                'categories' => $categories
            ]);
        } else {
            $post = Post::where('id', $id)->first();

            $post->name = $request->name ?? $post->name;
            $post->description = $request->description ?? $post->description;
            $post->email = $request->email ?? $post->email;
            $post->phonenumber = $request->phonenumber ?? $post->phonenumber;
            $post->rent_per_month = $request->rent_per_month ?? $post->rent_per_month;
            $post->advance_payment = $request->advance_payment ?? $post->advance_payment;
            $post->save();
            return redirect('/account/listed')->with('message', 'Vos modifications ont bien été prises en compte');
        }
    }
    public function search(Request $request)
    {
        $request->validate([
            "KeyWord" => ["required"],

        ]);
        $KeyWord = $request->KeyWord;
        $result = Post::where('name', 'like', "%$KeyWord%");
        $posts  = $this->paginate($result, 6);
        return view('account/search', [
            'posts' => $posts,
            'KeyWord' => $KeyWord,
        ]);
    }
    public function delete($id)
    {
        $post  =  Post::where('id', $id)->delete();
        return \redirect()->route('account.listed')->with('message', 'l\'annonce à bien été supprimer ');
    }

    public function paginate($request, int $bypage)
    {
        return $request->paginate($bypage);
    }
}
