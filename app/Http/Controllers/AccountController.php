<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Cities;
use App\Models\History;
use App\Models\Categories;
use App\Models\Image_user;
use App\Models\Show_phone;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
            'categories' => $number_of_category,


        ]);
    }
    public function listed()
    {

        $res = Post::posts_by_user();
        $posts = $this->paginate($res, 6);
        return view('account/listed', [
            'posts' => $posts,

        ]);
    }
    public function consulted()
    {

        $historyId = [];
        $posts = null;
        $histories = History::where('user_id', Auth::user()->id);

        $histories = $this->paginate($histories, 8);

        return view('account/consulted', [
            'histories' => $histories,

        ]);
    }
    public function profile()
    {

        return view('account/profile', [
            'user' => Auth::user(),
        ]);
    }
    public function profile_update(Request $request)
    {
        //update personal information
        $request->user()->name  = $request->name ?? $request->user()->name;
        $request->user()->email  = $request->email ?? $request->user()->email;


        //upload image profile
        if ($request->image_user) {

            $filename = 'image' . $request->user()->name;
            if (Storage::exists('/ImageUser/' . $request->user()->name . '/' . $filename)) {
                Storage::delete('/ImageUser/' . $filename);

                $path = $request->file("image_user")->storeAs(
                    'ImageUser/' . $request->user()->name,
                    $filename,
                    'public'
                );
                $user = User::where('id', Auth::user()->id);
                $user->image_user = $path;
                $user->save();
            } else {
                $path = $request->file("image_user")->storeAs(
                    'ImageUser/' . $request->user()->name,
                    $filename,
                    'public'
                );
                $user = User::where('id', Auth::user()->id)->first();
                $user->image_user = $path;
                $user->save();
            }
        }


        // change password
        if ($request->old_password || $request->new_password || $request->confirm_password) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required'
            ]);
            if ($request->new_password === $request->confirm_password) {
                if (password_verify($request->password, $request->user()->password)) {
                    $request->user()->password = $request->password;
                    $request->user()->save();
                    return back()->with('message', 'your profile has been successfully modified');
                } else {
                    return back()->with('message', 'the old password it is not correct');
                }
            } else {
                return back()->with('message', 'confirm password it is not correct');
            }
        }
        $request->user()->save();
        return back()->with('message', 'your profile has been successfully modified');
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

    public function details($id, User $user)
    {

        $post = Post::find($id);
        if (!$post) {
            abort('404');
        }
        $show_phone = Show_phone::where('user_id', Auth::id())->where('post_id', $id)->first();
        $imagesPost = Image::where('post_id', $post->id)->get();
        if (Auth::check()) {
            $name = Auth::user()->name;
            $history = History::where('user_id', Auth::user()->id)->where('post_id', $id)->get();
            if ($history->isEmpty()) {
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
            'imagesPost' => $imagesPost,
            'show_phone' => $show_phone
        ]);
    }

    public function getcontact($id)
    {
        $user = User::where('id', Auth::id())->first();
        $balance  = $user->wallet->balance;
        if ($balance >= 5) {

            $user->wallet->balance = $user->wallet->balance - 5;
            $show_phone = new Show_phone();
            $show_phone->user_id = Auth::id();
            $show_phone->post_id = $id;
            $show_phone->statut = true;
            $show_phone->save();
            $user->wallet->save();
            return redirect()->back()->with('success', 'operation succefully !');
        } else {
            return redirect()->back()->with('error', 'you do not have enough points to perform this operation !');
        }
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        if (!$user->can('update', $post)) {
            abort('401');
        }
        if ($request->method() === 'GET') {
            $post = Post::find($id);
            $categories = Categories::all();
            return view('account/edit', [
                'post' => $post,
                'categories' => $categories
            ]);
        } elseif ($request->method() === 'POST') {
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
<<<<<<< HEAD
        $user = Auth::user();
        $post  =  Post::find($id)->delete();
        if (is_null($post)) {
            abort('404');
        }

=======
        $post  =  Post::where('id', $id)->first();
>>>>>>> 0c50fb2ed6549914fec7ac2d92980091d511885f
        if (!$user->can('delete', $post)) {
            abort('401');
        } else {
            $post->delete();
            return \redirect()->route('account.listed')->with('message', 'l\'annonce à bien été supprimer ');
        }
        
    }

    public function paginate($request, int $bypage)
    {
        return $request->paginate($bypage);
    }
    public function payment(Request $request, $montant, $points)
    {

        //request for obtain token
        $request_token = Http::post('https://demo.campay.net/api/token/', [
            "username" =>  "0Fcu5IQtEV2olUIxwgjoxhyJiPBtLMG-gAHHG3TsnmGRG9laJessydq_CdMG-rD44ubMPanJnn-On-iuqpjTIg",
            "password" => "UU3_yThxMwfBQdQ-p-qOpnUb2Ybtl67w8aC7YpnuQwg6HKgVCQLZTzJBEiB_Icb8FhXRUis4FLIS66Q2VdGtVw"
        ]);
        $token   = $request_token->json()['token'];

<<<<<<< HEAD

        //request for obtain the payement links
        $reference = 'House-payment-by-campay-' . uniqid();
=======
        
        //request for obtain the payment links
        $reference = 'House-payment-by-campay-'.uniqid();
>>>>>>> 0c50fb2ed6549914fec7ac2d92980091d511885f
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token,
        ])->post('https://demo.campay.net/api/get_payment_link/', [
            'Authorization' => 'Token ' . $token,
            "amount" => $montant,
            "external_reference" => $reference,
            "currency" => "XAF",
            "redirect_url" => "http://localhost:8000/payement/status"
        ]);
        if ($response->status() === 400) {
            return redirect()->back()->with('message', 'nous avons quelques problèmes veuillez réessayer plus tard');
        }
        $link = $response->json()['link'];
        $request->session()->push('points', $points);
        $request->session()->push('token', $token);
        return redirect($link);
    }
    public function payment_status(Request $request)
    {

        $token = $request->session()->get('token');
        $amount  = $request->amount;
        $points = $request->session()->get('points');
        $reference = $request->reference;
        //request for obtain the sstatus
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token[0],
        ])->get('https://demo.campay.net/api/transaction/' . $reference . '/', [
            'Authorization' => 'Token ' . $token[0],
        ]);
        $request->session()->forget('token');

        if ($response->status() === 401) {
            return redirect('/account/transaction')->with('message', "we have many problems please try later");
        }

        //save transaction
        $transaction  = new Transaction();
        $transaction->status = $response->json()['status'];
        $transaction->price = (int)$amount;
        $transaction->points = $points[0];
        $transaction->user_id = Auth::id();
        $transaction->save();

        $user = User::where('id', Auth::id())->first();
        if ($response->json()['status'] === "SUCCESSFUL") {
            $user->wallet->balance = $user->wallet->balance + $points[0];
            $user->wallet->save();
<<<<<<< HEAD
            return redirect('/account')->with('message', 'purchase of points successful !! your balance is ' . $user->wallet->balance . ' points');
=======
            $request->session()->forget('points');
            return redirect('account/transaction')->with('message', 'purchase of points successful !! your balance is '.$user->wallet->balance.' points');
>>>>>>> 0c50fb2ed6549914fec7ac2d92980091d511885f
        } elseif ($response->json()['status'] === "FAILED") {
            return redirect('account/transaction')->with('message', "check the amount of your balance  and try again");
        }
    }
    public function transaction()
    {
       
        $balance  = Auth::user()->wallet->balance;
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('account/transactions', [
            'balance' => $balance,
            'transactions' => $transactions
        ]);
    }
}
