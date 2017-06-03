<?php

use Illuminate\Support\Facades\Cache;

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

Route::get('/', function () {
    return View::make('welcome');
});


// Route::group(['prefix' => 'admins'],function(){

// Route::get('',function(){
//     return view('admin.index');
// })->name('admin.index');

// Route::get('create',function(){
//     return view('admin.create');
// })->name('admin.create');

// });

// Route::get('/admin/posts/example',
//  array('as' => 'admin.home', function () {
//     $url = route('admin.home');
//     return "this url is " . $url;
// }));

Route::get('about-page', function () {
    return view('other.about');
})->name('other.about');

Route::get('/Home', function () {
    return View::make('Home.home');
});

// Route::get('/post',"Posts\PostsController@index" )->name('Posts.PostsController');

// Route::post('/post',"Posts\PostsController@index" )->name('Posts.PostsController');
// Route::get('/post/{num1}',"Posts\PostsController@show_post" )->name('Posts.PostsController');

// Route::resource('post', 'Posts\PostsController');

// Route::get('/cache', function () {
//     return Cache::get('key');
// });


// Route::get('post/{id}/{name}', function ($id,$name) {
//     return "este es el numero de post  " . $id . $name;
// });