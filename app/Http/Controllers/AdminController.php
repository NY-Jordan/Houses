<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // user
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->user()->cannot('view', $user)) {
            abort(403);
        }
        $users  = User::all();
       return view('admin/index', [
           'datas' => $users
       ]);
    }

    public function add_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        if ($request->password === $request->confirm_password) {
            $user =  new User();
            $user->name  =  $request->name;
            $user->email  = $request->email;
            $user->status = $request->status;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
            return back()->with('message', 'l\'ustilisteur à bien été enregistré');
        } else {
            return back()->with('message', 'Confirm password is not correct');
        }
       
        
        
    }
    public function delete_user($id)
    {
        $user  = User::where('id', $id);
        $user->delete();
        return back()->with('message', 'Operation succesfully');
    }
    public function edit_user()
    {
        
    }
    //post

    public function posts()
    {
        $posts = Post::all();
        return view('admin/posts', [
            'datas' => $posts
        ]);
    }
    public function delete_post($id)
    {
        $post  = Post::where('id', $id);
        $post->delete();
        return back()->with('message', 'Operation succesfully');
    }
    public function disapproved($id)
    {
        $post =  Post::where('id', $id)->first();
        $post->status  = "not approved";
        $post->save();
        return back()->with('message', 'Operation succesfully');
    }
    public function approved($id)
    {
        $post =  Post::where('id', $id)->first();
        $post->status  = "approved";
        $post->save();
        return back()->with('message', 'Operation succesfully');
    }

    public function block($id)
    {
        $user =  User::where('id', $id)->first();
        $user->status_connection = 'block';
        $user->save();
        return back()->with('message', 'Operation succesfully');
    }
    public function unblock($id)
    {
        $user =  User::where('id', $id)->first();
        $user->status_connection = 'access';
        $user->save();
        return back()->with('message', 'Operation succesfully');
    }
}
