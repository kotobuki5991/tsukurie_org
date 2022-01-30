<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\User;
// use App\Models\CreatorType;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = [
        'user_id'         => 'required',
        'profile_name'    => 'required',
        // 'creator_type_id' => 'required',
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
