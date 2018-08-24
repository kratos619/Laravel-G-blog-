<?php

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


Route::get('/test2', function () {
    return App\Profile::find(1)->user;
});


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


/*
|--------------------------------------------------------------------------
|  For Reletionships     Web Routes
|--------------------------------------------------------------------------
|
|
*/

// Route::get('/test',function(){
//     return App\Post::find(1)->category() ;
// });



// Route::group(['prefix' => 'admin'], function () {

// Route::any('/post/create', [
//     'uses'=> 'PostsController@create',
//     'as'=> 'post.create'
// ]);

// Route::post('/post/store',[
//     'uses'=> 'PostsController@store',
//     'as' => 'post.store'
// ]);

// });


Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){
Route::get('/home', [
    'uses'=> 'HomeController@index',
    'as'=> 'home'
]);


    Route::any('/post/create', [
    'uses'=> 'PostsController@create',
    'as'=> 'post.create'
]);

Route::post('/post/store',[
    'uses'=> 'PostsController@store',
    'as' => 'post.store'
]);

//see all categories
Route::any('/categories',[
    'uses' => 'CategoriesController@index',
    'as' => 'categories'
]);


Route::any('/category/create',[
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
]);


Route::post('/cat/store',[
    'uses'=> 'CategoriesController@store',
    'as' => 'cat.store'
]);

Route::get('category/edit/{id}',[
    'uses'=> 'CategoriesController@edit',
    'as' => 'category.edit'
]);


Route::get('category/delete/{id}',[
    'uses'=> 'CategoriesController@destroy',
    'as' => 'category.delete'
]);
Route::post('/cat/update/{id}',[
    'uses'=> 'CategoriesController@update',
    'as' => 'cat.update'
]);

//Posts
//display All Posts
Route::any('/posts',[
    'uses' => 'PostsController@index',
    'as' => 'posts'
]);

Route::post('category/edit/{id}',[
    'uses'=> 'CategoriesController@edit',
    'as' => 'category.edit'
]);


Route::any('/posts/trashed',[
    'uses' => 'PostsController@trashed',
    'as' => 'posts.trashed'
]);


Route::get('/post/delete/{id}',[
'uses' => 'PostsController@destroy',
'as' => 'post.delete'
]);

Route::get('/post/kill/{id}',[
    'uses' => 'PostsController@kill',
    'as' => 'post.kill'
]);

Route::get('/post/restore/{id}',[
    'uses' => 'PostsController@restore',
    'as' => 'post.restore'
]);

Route::get('/post/edit/{id}',[
    'uses' => 'PostsController@edit',
    'as' => 'post.edit'
]);
Route::post('/post/update/{id}',[
    'uses' => 'PostsController@update',
    'as' => 'post.update'
]);

// routes for Tags

Route::any('/tags',[
    'uses' => 'TagsController@index',
    'as' => 'tags'
]);

Route::get('/tags/edit/{id}',[
    'uses' => 'TagsController@edit',
    'as' => 'tag.edit'
]);

Route::any('/tags/create/',[
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
]);

Route::post('/tags/store/',[
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
]);

Route::post('/tags/update/{id}',[
    'uses' => 'TagsController@update',
    'as' => 'tag.update'
]);

Route::get('/tags/delete/{id}',[
    'uses' => 'TagsController@destroy',
    'as' => 'tags.delete'
]);
Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
]);
Route::get('/users/create/',[
    'uses' => 'UsersController@create',
    'as' => 'users.create'
]);
Route::post('/users/store/',[
    'uses' => 'UsersController@store',
    'as' => 'users.store'
]);
});
