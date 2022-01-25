<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('main/index');
    }

    // 投稿ページへの遷移
    public function forPostPage(){
        return view('main/show_post');
    }

    // お問合せページへの遷移
    public function contact(Request $request)
    {
        return view('main/contact');
    }

    // マイページへの遷移
    public function toMyPageTop(Request $request)
    {
        $user = Auth::user();
        $user_info = [
            'user_name' => $user->name,
        ];

        return view('mypage/top', $user_info);
    }

    public function toMyPageEdit(Request $request)
    {
        $user = Auth::user();
        $user_info = [
            'user_id' => $user->id, //userテーブルのid
        ];

        return view('mypage/edit', $user_info);
    }

    public function toMyPageDelete(Request $request)
    {
        return view('mypage/delete_account');
    }



}
