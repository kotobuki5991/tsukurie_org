<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Contracts\Filesystem\Filesystem;
use App\Http\Helpers\SearchDb;

class ProfileController extends Controller
{

    // タスク indexとeditメソッドの冗長な部分をまとめる
    public function index(Request $request)
    {
        $profile_ary = SearchDb::showProfile(Auth::user()->id, 'equipment_type_icon_path_', 'equipment_maker_');

        return view('/mypage/top', ['profile' => $profile_ary]);
    }


    public function edit(Request $request)
    {
        $profile_ary = SearchDb::showEditProfile(Auth::user()->id, 'equipment_id_', 'equipment_maker_id_');

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

        // 入力した機材が10個未満の場合、未入力の部分にnullをセット
        for ($i=1; $i <= 10; $i++) {
            $form["equipment_id_{$i}"] = isset($form["equipment_id_{$i}"]) ? $form["equipment_id_{$i}"] : null;
            $form["equipment_maker_id_{$i}"] = isset($form["equipment_maker_id_{$i}"]) ? $form["equipment_maker_id_{$i}"] : null;
            $form["equipment_url_{$i}"] = isset($form["equipment_url_{$i}"]) ? $form["equipment_url_{$i}"] : null;
        }

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



    public function ajax(Request $request)
    {
        $equipment_makers = [];

        if ($request->equipment_type_id != 'empty'){
            //equipment_idでequipment_makersテーブルを検索、idとquipment_makerを検索して選択肢にする
            $equipment_makers = DB::table('equipment_makers')->select('id', 'equipment_maker')
                                    // 選択された楽器用の選択肢を取得
                                    ->where('equipment_type_id', $request->equipment_type_id)
                                    ->orderByRaw('equipment_maker')->get();
        }

        $ajax_param = [
            'equipment_makers' => $equipment_makers,
            'select_tag_id' => $request->id,
        ];

        // return view('/mypage/ajax_selecttag_foredit', ['ajax_param' => $ajax_param]);
        return view('/mypage/ajax_selecttag_foredit', ['ajax_param' => $ajax_param]);
    }
}
