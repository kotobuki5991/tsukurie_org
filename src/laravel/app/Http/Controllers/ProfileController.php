<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use \Illuminate\Contracts\Filesystem\Filesystem;

class ProfileController extends Controller
{

    // タスク indexとeditメソッドの冗長な部分をまとめる
    public function index(Request $request)
    {
        $auth_user_id = Auth::user()->id;
        // ログインユーザーのプロフィールカラム取得
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        // 重複したレコードは複数回とってこれない、表示順がid順ーーー＞修正する
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
            $equipment_type_icon_paths[] = EquipmentType::select('equipment_type_icon_path')
                -> where('id', $equipment_id)->get();
        }

        $profile_ary = [
            'id' => $profile->id,
            'user_id' => $profile->user_id,
            'profile_name' => $profile->profile_name,
            'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
            // 'profile_icon' => imagecreatefromstring(base64_decode(Storage::disk('s3')->get($profile->profile_icon))), //s3のurl
            'top_image' => Storage::disk('s3')->url($profile->top_image), //s3のurl
            'profile_icon' => Storage::disk('s3')->url($profile->profile_icon), //s3のurl
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

        $i = 1;
        foreach($equipment_type_icon_paths as $equipment_type_icon_path){
            $profile_ary['equipment_type_icon_path_' . $i] = $equipment_type_icon_path[0]->equipment_type_icon_path;
            $profile_ary['equipment_maker_' . $i] = 'xxxxx';
            $i++;
        }

        return view('/mypage/top', ['profile' => $profile_ary]);
    }


    public function edit(Request $request)
    {
        $auth_user_id = Auth::user()->id;
        // ログインユーザーのプロフィールカラム取得
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        // 重複したレコードは複数回とってこれない、表示順がid順ーーー＞修正する
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
        //     $equipment_type_icon_paths[] = EquipmentType::select('equipment_type_icon_path')
        //         -> where('id', $equipment_id)->get();
        // }

        $profile_ary = [
            'id' => $profile->id,
            'user_id' => $profile->user_id,
            'profile_name' => $profile->profile_name,
            'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
            // 'profile_icon' => imagecreatefromstring(base64_decode(Storage::disk('s3')->get($profile->profile_icon))), //s3のurl
            'top_image' => Storage::disk('s3')->url($profile->top_image), //s3のurl  画像がない場合はnull(別メソッドにまとめて例外処理、その際nullを返す？)
            'profile_icon' => Storage::disk('s3')->url($profile->profile_icon), //s3のurl
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

            'publish_flag' => $profile->publish_flag,
        ];

        // $i = 1;
        // foreach($equipment_type_icon_paths as $equipment_type_icon_path){
        //     $profile_ary['equipment_type_icon_path_' . $i] = $equipment_type_icon_path[0]->equipment_type_icon_path;
        //     $profile_ary['equipment_maker_' . $i] = 'xxxxx';
        //     $i++;
        // }

        return view('/mypage/edit', ['profile' => $profile_ary]);
    }




    public function update(Request $request)
    {

        $auth_user_id = Auth::user()->id;

        $this->validate($request, Profile::$rules);

        // ログインユーザーのidと更新するprofileテーブルのuser_idが異なる場合更新せずリダイレクト
        if ($request->user_id != $auth_user_id) {
            dd($request->user_id . ':' . $auth_user_id);
            return redirect('/mypage/top');
        }

        $form = $request->all();

        // アップロード画像が選択されている場合のみS3にアップロード
        if( isset($request->profile_icon) ){
            //タスク 後で冗長な部分をまとめる
            $profile_icon_path = Storage::disk('s3')
                ->putFileAs('/uploaded-images',$request->file('profile_icon'), 's3_profile_icon' . $auth_user_id . '.' . $request->profile_icon->getClientOriginalExtension());
            // S3アップロード先のパスを取得
            $form['profile_icon'] = $profile_icon_path;
        }

        if( isset($request->top_image) ){
            $top_image_path = Storage::disk('s3')
                ->putFileAs('/uploaded-images',$request->file('top_image'), 's3_top_image' . $auth_user_id . '.' . $request->top_image->getClientOriginalExtension());
            $form['top_image'] = $top_image_path;
        }


        unset($form['_token']);


        $profile = Profile::firstWhere('user_id', $request->user_id);

        $profile->fill($form)->save();

        return redirect('/mypage/top');
    }
}
