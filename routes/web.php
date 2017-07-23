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

	// user profile
	Route::get('/user/profile/{userid}', [
		'as' => 'user.profile',
		'uses' => 'ProfileController@getProfile'
		]);

	//sentiment

	Route::get('/sentiment', [
		'as' => 'posts.comments',
		'uses' => 'PagesController@getSentiment'
	]);

	//categories
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);

	// show posts categorywise
	Route::get('/post/category/{cat}', [
		'as' => 'pages.distinct',
		'uses' => 'PagesController@getPostCategoryWise'
		]);

	// post comments sentiment
	Route::get('/post/comments', [
		'as' => 'posts.comments',
		'uses' => 'PostController@getComments'
		]);

	//Tags
	Route::resource('tags', 'TagController', ['except' => ['create']]);

	//Comments


	Route::get('augments/{slug}', [
		'as' => 'augments.single',
		'uses' => 'AugmentsController@getSingle'])->where('slug', '[\w\d\-\_]+');

	// Route::get('posts/comments', [
	// 	'as' => 'posts.comments',
	// 	'uses' => 'PostController@getComments']);

	// Route::get('augments', ['uses' => 'AugmentsController@getIndex', 'as' => 'augments.index']);
	Route::get('contact', 'PagesController@getContact');
	Route::post('contact', 'PagesController@postContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', ['as' => 'house', 'uses' => 'PagesController@getIndex']);
	Route::resource('posts', 'PostController');
	Route::resource('posts.comments', 'CommentsController');
    });

	Route::get('/search',[
		'as' => 'search.result',
		'uses' => 'SearchController@getResult'
		]);

	// autosuggest search
	 Route::get('/autosuggest',[
		'as' => 'search.autosuggest',
		'uses' => 'SearchController@getAutoSuggestResult'
		]);
	// Api for android

	// for all posts
	Route::get('api/posts/all',[
		'as' => 'pages.api',
		'uses' => 'ApiController@getAllPosts'
		]);

	// for categorywise posts
	Route::get('api/post/{category}',[
		'as' => 'pages.api',
		'uses' => 'ApiController@getPostCategoryWise'
		]);

	Route::get('api/categories',[
		'as' => 'pages.api',
		'uses' =>'ApiController@getCategories'
		]);

	Route::get('api/weather/{id}',[
		'as' => 'pages.api',
		'uses' => 'ApiController@getPostDetails'
		]);
