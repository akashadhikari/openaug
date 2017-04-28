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



/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['middleware' => ['web']], function () {

	// Authentication routes 
	Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']); 
	Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']); 
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']); 

	//Registration routes 
	Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

	//Password resets-- do later

	//end of pw reset routes

	//categories
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);

	//Tags
	Route::resource('tags', 'TagController', ['except' => ['create']]);

	//Comments
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);


	Route::get('augments/{slug}', ['as' => 'augments.single', 'uses' => 'AugmentsController@getSingle'])->where('slug', '[\w\d\-\_]+');
	Route::get('augments', ['uses' => 'AugmentsController@getIndex', 'as' => 'augments.index']);
	Route::get('contact', 'PagesController@getContact');
	Route::post('contact', 'PagesController@postContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', ['as' => 'house', 'uses' => 'PagesController@getIndex']);
	Route::resource('posts', 'PostController');
    });

	// Api for android

	Route::get('api/posts/all',[
		'as' => 'pages.api',
		'uses' => 'ApiController@getAllPosts'
		]);

