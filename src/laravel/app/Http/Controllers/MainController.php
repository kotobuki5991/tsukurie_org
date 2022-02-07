<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Models\EquipmentType;
use App\Http\Helpers\SearchDb;

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

        // // クリックされた画像のユーザーのプロフィール取得
        // $profile = Profile::where('user_id', $request->user_id)->first();

        // $profile_ary = [
        //     'id' => $profile->id,
        //     'user_id' => $profile->user_id,
        //     'user_name' => $profile->user->name,
        //     'profile_name' => $profile->profile_name,
        //     'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
        //     'top_image' => isset($profile->top_image) ? Storage::disk('s3')->url($profile->top_image) : null, //s3のurl
        //     'profile_icon' => isset($profile->profile_icon) ? Storage::disk('s3')->url($profile->profile_icon) : null, //s3のurl
        //     'message' => $profile->message,
        //     'equipment_url_1' => $profile->equipment_url_1,
        //     'equipment_url_2' => $profile->equipment_url_2,
        //     'equipment_url_3' => $profile->equipment_url_3,
        //     'equipment_url_4' => $profile->equipment_url_4,
        //     'equipment_url_5' => $profile->equipment_url_5,
        //     'equipment_url_6' => $profile->equipment_url_6,
        //     'equipment_url_7' => $profile->equipment_url_7,
        //     'equipment_url_8' => $profile->equipment_url_8,
        //     'equipment_url_9' => $profile->equipment_url_9,
        //     'equipment_url_10' => $profile->equipment_url_10,
        //     'publish_flag' => $profile->publish_flag,
        // ];

        // $equipment_type_icon_paths = [];

        // $equipment_ids = [
        //     $profile->equipment_id_1,
        //     $profile->equipment_id_2,
        //     $profile->equipment_id_3,
        //     $profile->equipment_id_4,
        //     $profile->equipment_id_5,
        //     $profile->equipment_id_6,
        //     $profile->equipment_id_7,
        //     $profile->equipment_id_8,
        //     $profile->equipment_id_9,
        //     $profile->equipment_id_10,
        // ];

        // foreach($equipment_ids as $equipment_id){
        //     if ( !isset($equipment_id)) continue;
        //     $equipment_type_icon_paths[] = EquipmentType::select('equipment_type_icon_path')
        //         -> where('id', $equipment_id)->get();
        // }

        // $i = 1;
        // foreach($equipment_type_icon_paths as $equipment_type_icon_path){
        //     $profile_ary['equipment_type_icon_path_' . $i] = $equipment_type_icon_path[0]->equipment_type_icon_path;
        //     $profile_ary['equipment_maker_' . $i] = 'xxxxx';
        //     $i++;
        // }

        return view('main/show_post', ['profile' => $profile_ary]);
    }

    // お問合せページへの遷移
    public function contact(Request $request)
    {
        return view('main/contact');
    }

    // マイページへの遷移
    // public function toMyPageTop(Request $request)
    // {
    //     $user = Auth::user();
    //     $user_info = [
    //         'user_name' => $user->name,
    //     ];

    //     return view('mypage/top', $user_info);
    // }

    public function toMyPageDelete(Request $request)
    {
        return view('mypage/delete_account');
    }



}
