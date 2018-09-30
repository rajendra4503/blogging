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

Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'  => 'index'
]);


Route::get('/test',function(){

  dd(App\Category::findOrFail(7)->posts());

});

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);


Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/search',function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();
    return view('search')->with('posts',$posts)
        ->with('setting', \App\Setting::first())
        ->with('categories', \App\Category::all())
        ->with('query',request('query'));
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

    Route::get('/users',[
     'uses'  => 'UserController@index',
     'as'    => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UserController@create',
        'as'   => 'user.create'
    ])->middleware('admin');

    Route::post('/user/store',[
        'uses' => 'UserController@store',
        'as'   => 'user.store'
    ])->middleware('admin');

    Route::get('/user/delete/{id}',[
        'uses'  => 'UserController@delete',
        'as'    => 'user.delete'
    ])->middleware('admin');

    Route::get('user/admin/{id}',[
        'uses'  => 'UserController@make_admin',
        'as'    => 'user.admin'
    ])->middleware('admin');

    Route::get('user/not_admin/{id}',[
        'uses'  => 'UserController@not_admin',
        'as'    => 'user.not_admin'
    ])->middleware('admin');

    Route::get('user/profile',[
        'uses'=>'ProfilesController@index',
        'as'  => 'user.profile'
    ]);

    Route::post('user/profile/update',[
        'uses'=>'ProfilesController@update',
        'as'  => 'user.profile.update'
    ]);

    Route::get('setting',[
        'uses' => 'SettingController@index',
        'as'   => 'setting'
    ]);

    Route::post('setting/update',[
        'uses' => 'SettingController@update',
        'as'   => 'setting.update'
    ]);
    
});
