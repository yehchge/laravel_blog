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

// Route::get('post', 'HomeController@index');
Route::get('/blogs', 'BlogController@index')->name('blogs.index');
Route::get('/blogs/help', 'BlogController@help')->name('blogs.help');
Route::get('/blogs/login', 'BlogController@login')->name('blogs.login');
Route::post('/blogs/run', 'BlogController@run')->name('blogs.run');
Route::get('/blogs/dashboard', 'BlogController@dashboard')->name('blogs.dashboard');
Route::post('/blogs/xhrInsert', 'BlogController@xhrInsert')->name('blogs.xhrInsert');
Route::get('/blogs/logout', 'BlogController@logout')->name('blogs.logout');
Route::get('/blogs/xhrGetListings', 'BlogController@xhrGetListings')->name('blogs.xhrGetListings');
Route::post('/blogs/xhrDeleteListing', 'BlogController@xhrDeleteListing')->name('blogs.xhrDeleteListing');
Route::get('/blogs/note', 'BlogController@note')->name('blogs.note');
Route::post('/blogs/create', 'BlogController@create')->name('blogs.create');
Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('blogs.edit');
Route::get('/blogs/delete/{id}', 'BlogController@delete')->name('blogs.delete');
Route::post('/blogs/editSave/{id}', 'BlogController@editSave')->name('blogs.editSave');
Route::get('/blogs/user', 'BlogController@user')->name('blogs.user');
Route::post('/blogs/user_add', 'BlogController@user_add')->name('blogs.user_add');
Route::get('/blogs/user_del/{id}', 'BlogController@user_del')->name('blogs.user_del');
Route::get('/blogs/user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');
Route::post('/blogs/user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');


Route::resource('posts','PostController');
Route::resource('tasks','TaskController');
Route::resource('dicts','DictController');
// Route::resource('blogs','BlogController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
