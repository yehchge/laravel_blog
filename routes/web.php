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

Route::group(['prefix'=>'/blogs'], function(){
    Route::get('/', 'BlogController@index')->name('blogs.index');
    Route::get('help', 'BlogController@help')->name('blogs.help');
    Route::get('login', 'BlogController@login')->name('blogs.login');
    Route::post('run', 'BlogController@run')->name('blogs.run');
    Route::get('dashboard', 'BlogController@dashboard')->name('blogs.dashboard');
    Route::post('xhrInsert', 'BlogController@xhrInsert')->name('blogs.xhrInsert');
    Route::get('logout', 'BlogController@logout')->name('blogs.logout');
    Route::get('xhrGetListings', 'BlogController@xhrGetListings')->name('blogs.xhrGetListings');
    Route::post('xhrDeleteListing', 'BlogController@xhrDeleteListing')->name('blogs.xhrDeleteListing');
    Route::get('note', 'BlogController@note')->name('blogs.note');
    Route::post('create', 'BlogController@create')->name('blogs.create');
    Route::get('edit/{id}', 'BlogController@edit')->name('blogs.edit');
    Route::get('delete/{id}', 'BlogController@delete')->name('blogs.delete');
    Route::post('editSave/{id}', 'BlogController@editSave')->name('blogs.editSave');
    Route::get('user', 'BlogController@user')->name('blogs.user');
    Route::post('user_add', 'BlogController@user_add')->name('blogs.user_add');
    Route::get('user_del/{id}', 'BlogController@user_del')->name('blogs.user_del');
    Route::get('user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');
    Route::post('user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');
});

Route::resource('posts','PostController');
Route::resource('tasks','TaskController');
Route::resource('dicts','DictController');
// Route::resource('blogs','BlogController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
