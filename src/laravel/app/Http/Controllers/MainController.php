<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('mypage/top');
    }

    public function toMyPageEdit(Request $request)
    {
        return view('mypage/edit');
    }



}
