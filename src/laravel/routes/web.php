<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UploadController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

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
// ユーザー登録メール認証
////////////////////////////////////////////////

// メール確認の通知（確認リンククリックの指示）
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 電子メールの確認リンク押下時リクエストの処理
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    // return redirect('/home');
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// メール確認の再送信
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

////////////////////////////////////////////////
// マイページ遷移のみ
////////////////////////////////////////////////
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/mypage/top', 'ProfileController@index');
    Route::post('/mypage/top', 'MainController@toMyPageTop');

    // プロフィール編集
    // Route::get('/mypage/edit', 'MainController@toMyPageEdit');
    Route::get('/mypage/edit', 'ProfileController@edit');
    Route::post('/mypage/update', 'ProfileController@update');


    // 画像トリミング用
    Route::get('upload',[UploadController::class, 'index']);
    Route::post('crop',[UploadController::class, 'crop'])->name('crop');


    // アカウント削除
    Route::get('/mypage/delete_account', 'MainController@toMyPageDelete');
    Route::post('/mypage/destroy_account', 'MainController@softDeleteAccount');

    // プロフィール編集用ajax
    Route::get('/mypage/ajax_selecttag_foredit/{equipment_type_id}/{id}', 'ProfileController@ajax');
    Route::get('/mypage/ajax_creator_type_change/{equipment_type_id}', 'ProfileController@changeCreatorTypeTag');
    Route::get('/mypage/ajax_used_item_form_change/{equipment_type_id}', 'ProfileController@changeUsedItemForm');
});
