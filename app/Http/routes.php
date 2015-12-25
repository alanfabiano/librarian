<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => '','middleware' => 'Language'], function(){

	Route::group(['prefix' => 'livros'],function(){

		Route::get('', ['as' => 'books.index', 'uses' => 'BooksController@index']);
		Route::get('categoria/{categoria}', ['as' => 'books.index', 'uses' => 'BooksController@category']);
		Route::get('{slug}', ['as' => 'books.show', 'uses' => 'BooksController@show']);
		Route::post('search', ['as' => 'books.search', 'uses' => 'BooksController@search']);
		
	});

	Route::group(['prefix' => 'autores'], function(){
		Route::get('', ['as' => 'authors.index', 'uses' => 'AuthorsController@index']);
		Route::get('{slug}', ['as' => 'authors.show', 'uses' => 'AuthorsController@profile']);
		Route::post('search', ['as' => 'authors.search', 'uses' => 'Authors@controller@search']);
	});

	Route::group(['prefix' => 'categorias'],function(){
		Route::get('', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);
		Route::get('{slug}', ['as' => 'categories.show', 'uses' => 'CategoryController@show']);
		Route::post('search', ['as' => 'categories.search', 'uses' => 'CategoryController@search']);
	});

	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

		Route::group(['prefix' => 'livros'], function(){});
		Route::group(['prefix' => 'autores'], function(){});
		Route::group(['prefix' => 'categorias'], function(){});

	});

});

