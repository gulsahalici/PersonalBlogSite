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

	Route::group(['middleware' => ['web']], function () {

		//Route::get('auth/login','Auth\RegisterController@getLogin');
		//Route::post('auth/login','Auth\RegisterController@postLogin');
		//Route::get('auth/logout','Auth\RegisterController@getLogout');

		//Route::get('auth/register','Auth\RegisterController@getRegister');
		//Route::post('auth/register','Auth\RegisterController@postLogin');

		Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug', '[A-Za-z-_\d]+');
		
		Route::get('/blog', ['as'=>'blog.index', 'uses'=>'BlogController@getIndex']);

		Route::get('/', 'PagesController@getIndex');

		Route::get('/about', 'PagesController@getAbout');

		Route::get('/contact', 'PagesController@getContact');

		Route::post('/contact','PagesController@postContact');

		Route::resource('posts','PostController');

		Route::resource('categories','CategoryController',['except'=>['create']]);

		Route::resource('tags','TagController',['except'=>['create']]);

		Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
		Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
		Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
		Route::get('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
		Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);

	});
Auth::routes();

Route::get('/home', 'PagesController@getIndex')->name('home');
