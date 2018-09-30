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
    return view('home');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('admin', function () {
    return view('admin.index');
});
Route::resource('user', 'UsersController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('post', 'PostController');
Route::get('post/download/{file}', 'PostController@download')->name('post.download');

/**
 * Download file route handle
 */
Route::get('file/{file}', function ($file) {
    return response()->download(storage_path('app/uploads/' . $file));
});