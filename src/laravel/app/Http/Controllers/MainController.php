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
}
