<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $user_profiles = Profile::where('publish_flag', 1)->paginate(1);
        // dd($user_profiles);
        $profile_ary = [];
        foreach($user_profiles as $user_profile){
            $profile_ary[] = [
                'user_id' => $user_profile->user_id,
                'profile_name' => $user_profile->profile_name,
                'creator_type' => $user_profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
                'top_image' => isset($user_profile->top_image) ? Storage::disk('s3')->url($user_profile->top_image) : null, //s3のurl
                'profile_icon' => isset($user_profile->profile_icon) ? Storage::disk('s3')->url($user_profile->profile_icon) : null, //s3のurl
                'message' => $user_profile->message,
            ];
        }

        return view('main/index', ['profile_ary' => $profile_ary, 'paginate' =>  $user_profiles ]);
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

    // public function toMyPageEdit(Request $request)
    // {
    //     $user = Auth::user();
    //     $user_info = [
    //         'user_id' => $user->id, //userテーブルのid
    //     ];

    //     return view('mypage/edit', $user_info);
    // }

    public function toMyPageDelete(Request $request)
    {
        return view('mypage/delete_account');
    }



}
