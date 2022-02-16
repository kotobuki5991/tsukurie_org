<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Models\EquipmentType;
use App\Http\Helpers\SearchDb;
use App\Models\User;

class MainController extends Controller
{
    // タスク 冗長さ改善
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

    public function search(Request $request)
    {
        $search_terms = [
            ['publish_flag', 1],
            ['profile_name', 'LIKE', $request->search_word],
        ];

        if(isset($request->creator_type)){
            $search_terms[] = ['creator_type_id', $request->creator_type];
        }

        $user_profiles = Profile::where($search_terms)->paginate(1);

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
    public function forPostPage(Request $request)
    {
        $profile_ary = SearchDb::showProfile($request->user_id, 'equipment_type_icon_path_', 'equipment_maker_');

        return view('main/show_post', ['profile' => $profile_ary]);
    }

    // お問合せページへの遷移
    public function contact(Request $request)
    {
        $profile = Profile::firstWhere('user_id', $request->user_id);

        $mail_from = isset($profile->profile_name) ? $profile->profile_name : 'guest';

        return view('main/contact', ['mail_from' => $mail_from]);
    }

    public function toMyPageDelete(Request $request)
    {
        return view('mypage/delete_account');
    }

    public function softDeleteAccount(Request $request)
    {
        $delete_user_id = Auth::user()->id;

        // userとprofileをソフトデリートする
        User::firstWhere('id', $delete_user_id)->delete();
        Profile::firstWhere('user_id', $delete_user_id)->delete();
        // dd(Profile::firstWhere('user_id', $delete_user_id));


        return redirect('/');
    }



}
