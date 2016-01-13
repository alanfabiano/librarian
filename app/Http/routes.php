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

Route::get('setLocale/{locale}',['as' => 'set.locale', 'middleware' => 'SetLanguage']);




Route::get('', ['as' => 'index', 'uses' => function(){
	return view('home');
}]);

Route::group(['prefix' => 'livros'],function(){
	Route::get('', ['as' => 'books.index', 'uses' => 'BooksController@index']);
	// Books CRUD
	Route::get('create', ['as' => 'books.create', 'uses' => 'BooksController@create']);
	Route::post('save', ['as' => 'books.save', 'uses' => 'BooksController@save']);
	Route::get('{id}/edit', ['as' => 'books.edit', 'uses' => 'BooksController@edit']);
	Route::put('update', ['as' => 'books.update', 'uses' => 'BooksController@update']);
	// End Books CRUD

	Route::get('categoria/{categoria}', ['as' => 'books.categoria', 'uses' => 'BooksController@category']);
	Route::get('categorias', ['as' => 'books.categorias', 'uses' => 'BooksController@categories']);
	Route::get('{slug}', ['as' => 'books.show', 'uses' => 'BooksController@show']);
	Route::post('search', ['as' => 'books.search', 'uses' => 'BooksController@search']);
});
Route::group(['prefix' => 'autores'], function(){
	Route::get('', ['as' => 'authors.index', 'uses' => 'AuthorsController@index']);
	Route::get('{slug}', ['as' => 'authors.show', 'uses' => 'AuthorsController@profile']);
	Route::post('search', ['as' => 'authors.search', 'uses' => 'Authors@controller@search']);
});
