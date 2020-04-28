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

    // ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
    
    
    Route::get('/folders/{id}/comics', 'ComicsController@index')->name('comics.index');
    
    Route::get('/folders/create', 'FoldersController@create')->name('folders.create');
    Route::post('/folders/create', 'FoldersController@store')->name('folders.store');
    
    Route::get('/folders/{id}/comics/create', 'ComicsController@create')->name('comics.create');
    Route::post('/folders/{id}/comics/create', 'ComicsController@store')->name('comics.store');;
    
    Route::get('/folders/{id}/tasks/{comic_id}/edit', 'ComicsController@edit')->name('comics.edit'); 
    Route::post('/folders/{id}/tasks/{comic_id}/edit', 'ComicsController@update')->name('comics.update');
    
    
});
