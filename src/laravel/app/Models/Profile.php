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
