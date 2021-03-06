<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|,
*/

Route::get('setLocale/{locale}',['as' => 'set.locale', 'middleware' => 'SetLanguage', function ($locale) {
    // SET LOCALE
}]);


Route::get('', ['as' => 'index', 'uses' => function(){
	return view('home');
}]);

Route::group(['prefix' => 'books'],function(){
	Route::get('', ['as' => 'books.index', 'uses' => 'BooksController@index']);
	Route::get('category/{category}', ['as' => 'books.category', 'uses' => 'BooksController@category']);
	Route::get('categories', ['as' => 'books.categories', 'uses' => 'BooksController@categories']);
	Route::get('{slug}', ['as' => 'books.show', 'uses' => 'BooksController@show']);
	Route::post('search', ['as' => 'books.search', 'uses' => 'BooksController@search']);
});
Route::group(['prefix' => 'authors'], function(){
	Route::get('', ['as' => 'authors.index', 'uses' => 'AuthorsController@index']);
	Route::get('{slug}', ['as' => 'authors.show', 'uses' => 'AuthorsController@profile']);
	Route::post('search', ['as' => 'authors.search', 'uses' => 'Authors@controller@search']);
});


Route::group(['prefix' => 'admin'], function(){

	// ROUTES OF BOOKS
	Route::get('books/{id}/status', ['as' => 'admin.books.status', 'uses' => 'AdminBookController@status']);
	Route::resource('books', 'AdminBookController');

	// ROUTES OF AUTHORS
	Route::get('authors/{id}/status', ['as' => 'admin.authors.status', 'uses' => 'AdminAuthorController@status']);
	Route::resource('authors', 'AdminAuthorController');



});
