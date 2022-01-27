<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // ログインユーザーのプロフィールを表示
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        return view('/mypage/top', ['profile' => $profile]);
    }


    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);

        // ログインユーザーのidと更新するprofileテーブルのuser_idが異なる場合更新せずリダイレクト
        if($request->user_id != Auth::user()->id){
            return redirect('/mypage/top');
        }

        $form = $request->all();
        unset($form['_token']);

        // $profile = Profile::find($request->id);
        $profile = Profile::firstWhere('user_id', $request->user_id);

        $profile->fill($form)->save();

        return redirect('/mypage/top');
    }
}
