<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'Account'])->name('account');
    Route::get('/account/listed', [AccountController::class, 'listed'])->name('account.listed');
    Route::get('/account/consulted', [AccountController::class, 'consulted'])->name('account.consulted');
    Route::get('/account/add', [AccountController::class, 'AccountAdd'])->name('account.add');
    Route::post('/account/add-submit', [AccountController::class, 'AccountAdd'])->name('account.add.submit');
    Route::get('account/property/{id}/edit', [AccountController::class, 'edit'])->name('property.edit');
    Route::post('account/property/edit/{id}/submit', [AccountController::class, 'edit'])->name('property.edit.submit');
    Route::post('account/property/{id}/delete', [AccountController::class, 'delete'])->name('property.delete');
    Route::get('account/search', [AccountController::class, 'search'])->name('account.search');
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/payement', [AccountController::class, 'payement'])->name('account.payement');
    Route::post('/update-profile', [AccountController::class,  'profile_update'])->name('profile.update');
});
Route::get('/property/{id}/details', [AccountController::class, 'details'])->name('property.details');
Route::get('/result', [AppController::class, 'result'])->name('result');
Route::get('/search', [AppController::class, 'search'])->name('app.search');
Route::get('/posts-by-category/{id}', [AppController::class, 'by_category'])->name('post.category');
Route::get('/Posts-by-city', [AppController::class, 'by_city'])->name('post.city');
Route::get('/Posts-by-price', [AppController::class, 'by_price'])->name('post.price');
Route::get('/', [AppController::class, 'index'])->name('index');

require __DIR__.'/auth.php';
