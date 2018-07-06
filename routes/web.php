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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('create/post',[
        'uses'=>'PostsController@create',
        'as'  => 'create.post'
    ]);
    
    Route::post('/store/post',[
        'uses'=>'PostsController@store',
        'as'  => 'store.post'
    ]);

    Route::get('create/category',[
        'uses' => 'CategoriesController@create',
        'as'   => 'create.category'
    ]);

    Route::post('/store/category',[
        'uses' => 'CategoriesController@store',
        'as'   => 'store.category'
    ]);

    Route::get('category',[
        'uses' => 'CategoriesController@index',
        'us'   => 'category'
    ]);

});
