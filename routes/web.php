<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

// Route::get('/logout', function (){
//     Auth::logout();
//     return redirect('/');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('articles', function(){
//     return "This is article page";
// });
//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/{id?}', 'ArticlesController@show');
Route::resource('/', 'ArticlesController');
Route::resource('/articles', 'ArticlesController');

// Route::get('categories', function(){
//     return "This is categories page";
// });

Route::get('categories', 'CategoriesController@index');

//Route::controller is Deprecate 
//Route::controller('pages', 'PagesController');

Route::get('pages/about', 'PagesController@about');
Route::get('pages/contact', 'PagesController@contact');
Route::resource('pages', 'PagesController');

