<?php

use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminKategoriController;
use App\Models\kategori;
use App\Models\User;

Route::get('/home ', function () {
    return view('home', [
        "title" => "home",
        'active'=>'home'
    ]);
});

Route::get('/about ', function () {
    return view('about', [
        "title" => "about",
        'active'=> 'about'
    ]);
});


Route::get('/blog ', [postcontroller::class,'index']);
Route::get('/posts/{posts:slug}', [postcontroller::class,'show']);
// Route::get('/blog/{kategori:slug}', function (kategori $kategori){
//     return view('post', [
//         'title'=>$kategori->nama,
//         'active'=>'kategoris',
//         'post'=>$kategori->post->load('kategori','author'),
       
//     ]);
// });

Route::get('/categories', function(){
    return view('categories',[
        'title'=>'Post kategori',
        'active'=>'categories',
        'kategoris'=> kategori::all()
    ]);
});

//dalam kasus route model binding tidak bisa menerapkan method with
//dalam kasus ini pakai method load
// Route::get('/authors/{author:username}', function(user $author){
//     return view('post', [
//     'title'=>'user Post',
//     'active'=>'post',
//     'post'=>$author->post->load('kategori','author'),
//  ]);
// });
//name login untuk mengarahkan user guest ke route login jika mengakses lewat link
Route::get('/Login',[LoginController::Class,'index' ])->name('login')->middleware('guest');
Route::post('/Login',[LoginController::Class,'autenticate' ]);
Route::post('/Logout',[LoginController::Class,'Logout' ]);
Route::get('/Register',[RegisterController::Class,'index' ])->middleware('guest');
Route::post('/Register',[RegisterController::Class,'store' ])->middleware('guest');
Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[
    DashboardPostController::class,'checkSlug'
])->middleware('auth');
Route::get('/dashboard/kategori/checkSlug',[
    DashboardPostController::class,'checkSlug'
])->middleware('auth');

Route::resource('/dashboard/posts',DashboardPostController::Class)->middleware('auth');

Route::middleware(isAdmin::class)->resource('/dashboard/kategori',AdminKategoriController::Class)->except('show');