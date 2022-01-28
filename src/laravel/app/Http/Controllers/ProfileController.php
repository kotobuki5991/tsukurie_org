<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // ログインユーザーのプロフィールカラム取得
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        $equipment_type_icon_paths = EquipmentType::select('equipment_type_icon_path')
            -> whereIn('id', [
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
            ])->get();

        $profile_ary = [
            'id' => $profile->id,
            'user_id' => $profile->user_id,
            'profile_name' => $profile->profile_name,
            'creator_type' => $profile->creator_type->creator_type, //creator_typesのidとprofilesのcreator_types_idで紐づいたcreator_typeを取得
            'profile_icon' => $profile->profile_icon,
            'top_image' => $profile->top_image,
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
        ];

        $i = 1;
        foreach($equipment_type_icon_paths as $equipment_type_icon_path){
            $profile_ary['equipment_type_icon_path_' . $i] = $equipment_type_icon_path->equipment_type_icon_path;
            $profile_ary['equipment_maker_' . $i] = 'xxxxx';
            $i++;
        }
        
        return view('/mypage/top', ['profile' => $profile_ary]);
    }


    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);

        // ログインユーザーのidと更新するprofileテーブルのuser_idが異なる場合更新せずリダイレクト
        if ($request->user_id != Auth::user()->id) {
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
