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
////////////////////////////////////////////////
// 投稿ページ
////////////////////////////////////////////////
Route::get('/show_post', 'MainController@forPostPage');
////////////////////////////////////////////////
// 問い合わせページ
////////////////////////////////////////////////
Route::get('/contact', 'MainController@contact');
Route::post('/contact', 'MainController@contact');
////////////////////////////////////////////////
// マイページ遷移のみ
////////////////////////////////////////////////
Route::get('/mypage/top', 'MainController@toMyPageTop')
    ->middleware('auth');

Route::post('/mypage/top', 'MainController@toMyPageTop')
    ->middleware('auth');

Route::get('/mypage/edit', 'MainController@toMyPageEdit')
    ->middleware('auth');

Route::get('/mypage/delete_account', 'MainController@toMyPageDelete')
    ->middleware('auth');


Route::post('/mypage/update', 'ProfileController@update')
    ->middleware('auth');





