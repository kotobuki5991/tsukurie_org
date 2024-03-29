<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = array('id');

    public static $rules = [
        // 'user_id'         => 'required',
        'profile_name'    => 'required',
        'publish_flag' => 'required',
        // 'croped_base64_user_icon' => 'max:3072',//アイコンは3MBまで
        // 'croped_base64_profile_icon' => 'max:5120',//トップ画像は5MBまで
        'profile_icon' => 'max:3072',//アイコンは3MBまで
        'top_image' => 'max:5120',//トップ画像は5MBまで
        // 'equipment_url_1' => 'string|max:255',
        // 'equipment_url_2' => 'string|max:255',
        // 'equipment_url_3' => 'string|max:255',
        // 'equipment_url_4' => 'string|max:255',
        // 'equipment_url_5' => 'string|max:255',
        // 'equipment_url_6' => 'string|max:255',
        // 'equipment_url_7' => 'string|max:255',
        // 'equipment_url_8' => 'string|max:255',
        // 'equipment_url_9' => 'string|max:255',
        // 'equipment_url_10' => 'string|max:255',
    ];

    public function user()
    {
        // creator_typesテーブルのidと、profilesテーブルのcreator_types_idを関連づける
        return $this->belongsTo(User::class);
    }

    public function creator_type()
    {
        // creator_typesテーブルのidと、profilesテーブルのcreator_types_idを関連づける
        return $this->belongsTo(CreatorType::class);
    }

    public function equipment_type()
    {
        // equipment_typesテーブルのidと、profilesテーブルのequipment_types_id_*(1-110)を関連づける
        return $this->belongsTo(EquipmentType::class);
    }




}
