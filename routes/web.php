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

Route::get('/test',function(){

  dd(App\Category::findOrFail(7)->posts());

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    

    Route::get('posts',[
        'uses' => 'PostsController@index',
        'as'   => 'posts'
    ]);

    Route::get('posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as'   => 'posts.trashed'
    ]);

    Route::get('post/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'  => 'post.edit'
    ]);

    Route::get('post/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'  => 'post.delete'
    ]);

    Route::get('post/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'  => 'post.kill'
    ]);

    Route::get('post/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'  => 'post.restore'
    ]);



    Route::get('create/post',[
        'uses'=>'PostsController@create',
        'as'  => 'create.post'
    ]);

    Route::post('update/post/{id}',[
        'uses'=>'PostsController@update',
        'as'  => 'update.post'
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
        'as'   => 'category'
    ]);

    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as'   => 'category.edit'
    ]);


    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as'   => 'category.delete'
    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as'   => 'category.update'
    ]);

    Route::get('tags',[
        'uses' => 'TagsController@index',
        'as'   => 'tags'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as'   => 'tag.edit'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as'   => 'tag.delete'
    ]);
    
    Route::get('create/tag',[
        'uses' => 'TagsController@create',
        'as'   => 'create.tag'
    ]);

    Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as'   => 'tag.store'
    ]);

    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as'   => 'tag.update'
    ]);

});
