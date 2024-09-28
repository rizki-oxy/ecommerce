<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;

Route::resource('admin', MainController::class)->middleware('auth');

Route::get('/', function () {
    return view('homepage');
});

Route::get('/faq', function () {
    return view('navsec.faq');
});

//Route::get('/detail-store', function () {
//    return view('store.detail-store');
//});

Route::get('/cart', function () {
    return view('navsec.cart');
});

Route::get('/syarat', function () {
    return view('navsec.syarat');
});

Route::get('/about', function () {
    return view('navsec.about');
});

//Route::get('/profil', function () {
//    return view('login.profil');
//});
    //Route::get('profil', [RegistController::class, 'profil'])->name('login.profil');
    //Route::put('/profil/update/{id}', [RegistController::class, 'update'])->name('login.profil');
//Route::get('/profil/{id}/edit', [RegistController::class, 'profilUpdate'])->name('profil.edit');


Route::get('/home-store', [MainController::class, 'homestore'])->name('home-store');
Route::get('/detail-store/{id}', [MainController::class, 'detailstore'])->name('detail.store');

Route::resource('store', StoreController::class)->middleware('auth');



//login-logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//daftar
Route::get('register', [RegistController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegistController::class, 'register']);



//superadmin
Route::get('user', [RegistController::class, 'index'])->name('users.index');
Route::put('users/{id}/update-role', [RegistController::class, 'updateRole'])->name('users.updateRole');
Route::get('/users/{id}/edit', [RegistController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [RegistController::class, 'destroy'])->name('users.destroy');

//profilupdate
Route::get('profile', [ProfileController::class, 'index'])->name('login.profil');
Route::put('profiles/{id}/update', [ProfileController::class, 'update'])->name('login.update');
Route::get('/profiles/{id}/edit', [ProfileController::class, 'edit'])->name('login.editProfil');
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('login.destroyProfile');

//editprofilestore
Route::put('/profiles/{id}/store', [ProfileController::class, 'updatestore'])->name('login.updatestore');


//cari
Route::get('/search', [MainController::class, 'search'])->name('search');
//filter
Route::get('/home-store/filter', [MainController::class, 'filter'])->name('store.filter');



Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

