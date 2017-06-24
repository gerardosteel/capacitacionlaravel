<?php

use Illuminate\Support\Facades\Cache;
use App\Tag;
use App\User;
use App\Post;
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
// Route::get('/sotfdelete', function() {
    
// });

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
Route::get('about-page', function () {
    return view('other.about');
})->name('other.about');

Route::get('/Home', function () {
    return View::make('Home.home');
});

Route::get('/read', function() {
    $r = DB::select('select * from tags where id =  ? ', [4]);
    foreach ($r as $d) {
    $arr = array( 'name' => $d->name );
    }
    return $arr['name'];
});

Route::get('/delete', function() {
    $r = DB::delete('delete from tags where id = ?', [1]);
    return ($r ? "borrado correctamente" : "ocurrio un error");
});


Route::get('/update', function() {
    $r = DB::update('update tags set name = "holi", frequency = "holi2" where id = ?', ['6']);
    return $r;
});

Route::get('/update2', function() {
    $r = DB::update('update tags set name = ? , frequency = ? where id = ?', ["holi3","holi3",6]);
    return $r;
});

Route::get('/insert', function() {
    DB::insert('insert into tags (name, frequency,created_at,updated_at) values (?, ?,?,?)', ['titulo de prueba', 'prueba de contenido', date("Y-m-d h:i:s") , date("Y-m-d h:i:s") ]);
    return "b";
});

//--------------------Eloquent---------------------

Route::get('/readeloquent', function() {
    $tags = Tag::all();
    // foreach ($tags as $tag) {
    
    // }
    return $tags;
});


Route::get('/find', function() {
    $tags = Tag::find(6);
    return $tags->name;
});


Route::get('/findwhere', function() {
    $tags = Tag::where('id','>',0)->orderBy('id','desc')->take(2)->get();
    return $tags;
});

Route::get('/basicinsert', function() {
    $tags = new Tag;
    $tags->name = "AAAAAAAAAAAA";
    $tags->frequency = "BBBBBBBBBBBBB";
    $tags->save();
});

Route::get('/basicinsert2', function() {
    $tags = Tag::find(6);
    $tags->name = "holi3.5";
    $tags->save();
});

Route::get('/createmass', function() {
    //cuandoo queremo inserta alfo como un array asociativo
    //nos sale el error MassAssignamentException
    // para repararlo hay que modificar el comportamiento del modelo con la propiedad fillable
   Tag::create(['name'=>'texto fillable','frequency'=>'texto f fillable']);
});


Route::get('/updateeloquent', function() {
    Tag::where('id','5')->update(['name' => 'iaslkdhasdhjkas','frequency'=>'ahsdhasdhashdhgs']);
});


Route::get('/deleteeloquent', function() {
    $tags = Tag::find(4);
    // elimina el registro a nivel logico
    $tags->delete();
});

Route::get('/deleteeloquentwithdestroy', function() {
    // elimina el registro a nivel real con softdeleted
    Tag::destroy(2);
    Tag::destroy([3,6]);
    Tag::where('id',4)->delete();
});

Route::get('/readsoftdelete', function() {
    $tags = Tag::onlyTrashed()->get(); 
    return $tags;
});

Route::get('/restoresoftdelete', function() {
    $tags = Tag::withTrashed()->restore(); 
    return ($tags ?  "correcto" : "error" );
});

Route::get('/forcedelete', function() {
    $tags = Tag::onlyTrashed()->where('id',4)->forceDelete(); 
    return ($tags ?  "correcto" : "error" );
});


// -----------------------Eloquent(Relaciones)---------------------

// relacion uno a uno
Route::get('/user/post/{id}', function($id) {
    return User::find($id)->post;
});

// relacion uno a uno inversa
Route::get('/post/{id}/user', function($id) {
    return Post::find($id)->user;
});

// relacion uno a muchos
Route::get('/postomany', function() {
    $user = User::find(1);
    foreach ($user->posts as $post) {
    echo $post->title . "<br>";
    //echo "{$post->title}<br>";
    }
});

//relacion muchos a muchos
Route::get('/users/{id}/role', function ($id) {
    // $user = User::find($id);
    // foreach ($user->roles as $role) {
    //     return $role->name;
    // }
    $user = User::find($id)->roles()->orderBy('id','desc')->get();
    return $user;    
});

//Accediendo a la tabla pivote
Route::get('/users/pivotes', function () {
   $user = User::find(1);
   foreach ($user->roles as $role) {
       echo $role->pivot->id."<br>";
   } 
}); 