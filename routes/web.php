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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


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

  
});