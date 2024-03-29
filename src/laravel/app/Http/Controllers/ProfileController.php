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
use Aws\Crypto\Cipher\CipherMethod;
use Illuminate\Http\File;
use Intervention\Image\Facades\Image;

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

        $form = $request->all();

        // 使用機材入力フォームの空欄を詰めて登録
        $num = 1;
        for ($i=1; $i <= 10 ; $i++) {
            if (isset($form["equipment_id_{$i}"]) && isset($form["equipment_maker_id_{$i}"])) {
                $form["equipment_id_{$num}"] = $form["equipment_id_{$i}"];
                $form["equipment_maker_id_{$num}"] = $form["equipment_maker_id_{$i}"];
                $num++;
            }
        }

        // 詰めた後の残りはnullで登録
        for ($i = $num; $i <= 10 ; $i++) {
            $form["equipment_id_{$i}"] = null;
            $form["equipment_maker_id_{$i}"] = null;
            $form["equipment_url_{$i}"] = null;
        }

        // 画像がセットされている場合、アップロードする
        if( isset($request->profile_icon) || isset($request->croped_base64_user_icon) ){
            if ($form['croped_base64_user_icon']){
                // デコードした画像をアップロードする

                // 画像をデコード
                $decoded_file_info = $this->decodeBase64Image($request->croped_base64_user_icon);
                // ファイル名を設定
                $fileName = 's3_profile_icon' . $auth_user_id . '.' . $decoded_file_info['file_extension'];
                // 保存するパスを決める
                $path = 'uploaded-images/'.$fileName;
                // AWS S3 に保存する
                Storage::disk('s3')->put($path, $decoded_file_info['file_data']);
                $form['profile_icon'] = $path;
            }else{
                $profile_icon_path = Storage::disk('s3')
                ->putFileAs('/uploaded-images',$request->file('profile_icon'), 's3_profile_icon' . $auth_user_id . '.' . $request->profile_icon->getClientOriginalExtension());
                // S3アップロード先のパスを取得
                $form['profile_icon'] = $profile_icon_path;
            }
        }

        // 画像がセットされている場合、アップロードする
        if( isset($request->top_image) || isset($request->croped_base64_profile_icon) ){
            if ($form['croped_base64_profile_icon']){
                // デコードした画像をアップロードする

                // 画像をデコード
                $decoded_file_info = $this->decodeBase64Image($request->croped_base64_profile_icon);
                // ファイル名を設定
                $fileName = 's3_top_image' . $auth_user_id . '.' . $decoded_file_info['file_extension'];
                // 保存するパスを決める
                $path = 'uploaded-images/'.$fileName;
                // AWS S3 に保存する
                Storage::disk('s3')->put($path, $decoded_file_info['file_data']);
                $form['top_image'] = $path;
            }else{
                // 画像をトリミングしなかった場合
                $top_image_path = Storage::disk('s3')
                ->putFileAs('/uploaded-images',$request->file('top_image'), 's3_top_image' . $auth_user_id . '.' . $request->top_image->getClientOriginalExtension());
                $form['top_image'] = $top_image_path;
            }
        }

        unset($form['_token']);
        unset($form['croped_base64_profile_icon']);

        $profile = Profile::firstWhere('user_id', Auth::user()->id);

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


    public function changeCreatorTypeTag(Request $request)
    {
        return view('/mypage/ajax_creator_type_change', ['ajax_param' => $request]);
    }

    public function changeUsedItemForm(Request $request)
    {
        return view('/mypage/ajax_used_item_form_change', ['ajax_param' => $request]);
    }





    private function decodeBase64Image($base64_file)
    {
        $file_info = [];
        // "data:{拡張子}"と"base64,"で区切る
        list($file_data_extention, $file_data) = explode(';', $base64_file);
        // 拡張子を取得
        $file_extension = explode('/', $file_data_extention)[1];
        // $file_dataにある"base64,"を削除する
        list(, $file_data) = explode(',', $file_data);
        // base64をデコード
        $file_data = base64_decode($file_data);
        // 画像を圧縮
        // $comp_file_data = Image::make($file_data)->fit(700, 467)->encode('jpeg');
        $file_info = [
            // 'file_data' => $comp_file_data,
            'file_data' => $file_data,
            'file_extension' => 'jpeg',
        ];
        return $file_info;
    }
}
