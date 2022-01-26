<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);

        $form = $request->all();
        unset($form['_token']);

        // $profile = Profile::find($request->id);
        $profile = Profile::firstWhere('user_id', $request->user_id);

        $profile->fill($form)->save();

        return redirect('/mypage/top');
    }
}
