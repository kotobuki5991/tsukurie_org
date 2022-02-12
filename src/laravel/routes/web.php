<?php

use Illuminate\Support\Facades\Route;


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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// メインページからのルーティング
////////////////////////////////////////////////
// トップ
////////////////////////////////////////////////
Route::get('/', 'MainController@index');
Route::post('/', 'MainController@index');

// Route::get('/{creator_type}', 'MainController@index');
Route::get('/', 'MainController@search')
    ->name('/search');
Route::post('/', 'MainController@search')
    ->name('/search');
////////////////////////////////////////////////
// 投稿ページ
////////////////////////////////////////////////
Route::get('/show_post/{user_id}', 'MainController@forPostPage')
    ->name('/show_post');
////////////////////////////////////////////////
// 問い合わせページ
////////////////////////////////////////////////
Route::get('/contact', 'MainController@contact');
Route::post('/contact', 'MainController@contact');


// Route::post('/contact/send', 'ContactController@send')->name('send');
Route::post('/contact', 'ContactController@send')->name('send');

////////////////////////////////////////////////
// マイページ遷移のみ
////////////////////////////////////////////////
Route::get('/mypage/top', 'ProfileController@index')
    ->middleware('auth');

Route::post('/mypage/top', 'MainController@toMyPageTop')
    ->middleware('auth');

Route::get('/mypage/edit', 'MainController@toMyPageEdit')
    ->middleware('auth');

Route::get('/mypage/delete_account', 'MainController@toMyPageDelete')
    ->middleware('auth');


// プロフィール編集ページへ
Route::get('/mypage/edit', 'ProfileController@edit')
    ->middleware('auth');
// プロフィール更新ボタン押下時
Route::post('/mypage/update', 'ProfileController@update')
    ->middleware('auth');


// プロフィール編集用ajax
Route::get('/mypage/ajax_selecttag_foredit/{equipment_type_id}/{id}', 'ProfileController@ajax')
    ->middleware('auth');

Route::get('/mypage/ajax_creator_type_change/{equipment_type_id}', 'ProfileController@changeCreatorTypeTag')
    ->middleware('auth');

Route::get('/mypage/ajax_used_item_form_change/{equipment_type_id}', 'ProfileController@changeUsedItemForm')
    ->middleware('auth');






