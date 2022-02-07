<?php
namespace App\Http\Helpers;

use App\Models\EquipmentType;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SearchDb{
    public static function showProfile($user, $equipment_type_tag_name, $equipment_maker_tag_name)
    {
        // ログインユーザーのプロフィールカラム取得
        $profile = Profile::where('user_id', $user)->first();

        // dd($profile);
        $profile_ary = [
            'id' => $profile->id,
            'user_id' => $profile->user_id,
            'user_name' => $profile->user->name,
            'profile_name' => $profile->profile_name,
            'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
            // 'profile_icon' => imagecreatefromstring(base64_decode(Storage::disk('s3')->get($profile->profile_icon))), //s3のurl
            'top_image' => isset($profile->top_image) ? Storage::disk('s3')->url($profile->top_image) : null, //s3のurl
            'profile_icon' => isset($profile->profile_icon) ? Storage::disk('s3')->url($profile->profile_icon) : null, //s3のurl
            'message' => $profile->message,
            'equipment_url_1' => $profile->equipment_url_1,
            'equipment_url_2' => $profile->equipment_url_2,
            'equipment_url_3' => $profile->equipment_url_3,
            'equipment_url_4' => $profile->equipment_url_4,
            'equipment_url_5' => $profile->equipment_url_5,
            'equipment_url_6' => $profile->equipment_url_6,
            'equipment_url_7' => $profile->equipment_url_7,
            'equipment_url_8' => $profile->equipment_url_8,
            'equipment_url_9' => $profile->equipment_url_9,
            'equipment_url_10' => $profile->equipment_url_10,
            'publish_flag' => $profile->publish_flag,
        ];

        // dd(isset($profile_ary['top_image']) . ':' . isset($profile_ary['profile_icon']));
        $equipment_type_icon_paths = [];

        $equipment_ids = [
            $profile->equipment_id_1,
            $profile->equipment_id_2,
            $profile->equipment_id_3,
            $profile->equipment_id_4,
            $profile->equipment_id_5,
            $profile->equipment_id_6,
            $profile->equipment_id_7,
            $profile->equipment_id_8,
            $profile->equipment_id_9,
            $profile->equipment_id_10,
        ];


        foreach($equipment_ids as $equipment_id){
            if ( !isset($equipment_id)) continue;
            $equipment_type_icon_paths[] = EquipmentType::select('equipment_type_icon_path')
                -> where('id', $equipment_id)->get();
        }

        $equipment_makers = [];

        $equipment_maker_ids = [
            $profile->equipment_maker_id_1,
            $profile->equipment_maker_id_2,
            $profile->equipment_maker_id_3,
            $profile->equipment_maker_id_4,
            $profile->equipment_maker_id_5,
            $profile->equipment_maker_id_6,
            $profile->equipment_maker_id_7,
            $profile->equipment_maker_id_8,
            $profile->equipment_maker_id_9,
            $profile->equipment_maker_id_10,
        ];


        foreach($equipment_maker_ids as $equipment_maker_id){
            if ( !isset($equipment_maker_id)) continue;
            $equipment_makers[] = DB::table('equipment_makers')->select('equipment_maker')
                -> where('id', $equipment_maker_id)->get();
        }



        $i = 1;

        // $equipment_type_icon_pathsの個数より$equipment_type_icon_pathが少ないとエラーがでる。
        // または、０個の場合はエラーか？
        // validationでセットで入力するようにするか例外でキャッチする
        foreach($equipment_type_icon_paths as $equipment_type_icon_path){
            // $profile_ary['equipment_type_icon_path_' . $i] = $equipment_type_icon_path[0]->equipment_type_icon_path;
            $profile_ary[$equipment_type_tag_name . $i] = $equipment_type_icon_path[0]->equipment_type_icon_path;
            // $profile_ary['equipment_maker_' . $i] = $equipment_makers[$i - 1][0]->equipment_maker;
            $profile_ary[$equipment_maker_tag_name . $i] = $equipment_makers[$i - 1][0]->equipment_maker;
            $i++;
        }


        return $profile_ary;
    }


    public static function showEditProfile($user, $equipment_type_tag_name, $equipment_maker_tag_name)
    {
        // ログインユーザーのプロフィールカラム取得
        $profile = Profile::where('user_id', $user)->first();

        // dd($profile);
        $profile_ary = [
            'id' => $profile->id,
            'user_id' => $profile->user_id,
            'user_name' => $profile->user->name,
            'profile_name' => $profile->profile_name,
            'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
            // 'profile_icon' => imagecreatefromstring(base64_decode(Storage::disk('s3')->get($profile->profile_icon))), //s3のurl
            'top_image' => isset($profile->top_image) ? Storage::disk('s3')->url($profile->top_image) : null, //s3のurl
            'profile_icon' => isset($profile->profile_icon) ? Storage::disk('s3')->url($profile->profile_icon) : null, //s3のurl
            'message' => $profile->message,
            'equipment_url_1' => $profile->equipment_url_1,
            'equipment_url_2' => $profile->equipment_url_2,
            'equipment_url_3' => $profile->equipment_url_3,
            'equipment_url_4' => $profile->equipment_url_4,
            'equipment_url_5' => $profile->equipment_url_5,
            'equipment_url_6' => $profile->equipment_url_6,
            'equipment_url_7' => $profile->equipment_url_7,
            'equipment_url_8' => $profile->equipment_url_8,
            'equipment_url_9' => $profile->equipment_url_9,
            'equipment_url_10' => $profile->equipment_url_10,

            'equipment_id_1' => $profile->equipment_id_1,
            'equipment_id_2' => $profile->equipment_id_2,
            'equipment_id_3' => $profile->equipment_id_3,
            'equipment_id_4' => $profile->equipment_id_4,
            'equipment_id_5' => $profile->equipment_id_5,
            'equipment_id_6' => $profile->equipment_id_6,
            'equipment_id_7' => $profile->equipment_id_7,
            'equipment_id_8' => $profile->equipment_id_8,
            'equipment_id_9' => $profile->equipment_id_9,
            'equipment_id_10' => $profile->equipment_id_10,

            'equipment_maker_id_1' => $profile->equipment_maker_id_1,
            'equipment_maker_id_2' => $profile->equipment_maker_id_2,
            'equipment_maker_id_3' => $profile->equipment_maker_id_3,
            'equipment_maker_id_4' => $profile->equipment_maker_id_4,
            'equipment_maker_id_5' => $profile->equipment_maker_id_5,
            'equipment_maker_id_6' => $profile->equipment_maker_id_6,
            'equipment_maker_id_7' => $profile->equipment_maker_id_7,
            'equipment_maker_id_8' => $profile->equipment_maker_id_8,
            'equipment_maker_id_9' => $profile->equipment_maker_id_9,
            'equipment_maker_id_10' => $profile->equipmentmaker_id_10,

            'publish_flag' => $profile->publish_flag,
        ];

        return $profile_ary;
    }

}
