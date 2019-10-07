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


Route::group(['prefix' => 'admin', 'middleware' => 'auth' ], function() {
 
  //ニュース新規登録画面
  Route::get('news/create','Admin\NewsController@add');
  Route::post('news/create', 'Admin\NewsController@create');
  
   //ニュース登録済一覧（編集ボタンが表示される）
  Route::get('news', 'Admin\NewsController@index');
 
   //ニュース編集画面（admin/news/edit?id=1）
  Route::get('news/edit', 'Admin\NewsController@edit');
  
   //ニュース編集画面から送信されたフォームデータを処理
  Route::post('news/edit', 'Admin\NewsController@update');
  
   // ニュース編集削除
  Route::get('news/delete', 'Admin\NewsController@delete');
  

  
 
   //プロフィール登録画面
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::get('profile','Admin\ProfileController@index');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/edit', 'Admin\ProfileController@update');
  Route::get('profile/delete', 'Admin\ProfileController@delete');  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  // ユーザー画面
  Route::get('/', 'NewsController@index');
  
  Route::get('/profile', 'ProfileController@index');