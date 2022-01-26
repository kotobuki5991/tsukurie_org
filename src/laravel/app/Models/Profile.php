<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = [
        'user_id'         => 'required',
        'profile_name'    => 'required',
        'creatortype_id' => 'required',
    ];

}
