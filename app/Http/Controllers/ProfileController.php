<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
            $user = Auth::user();


        $data =DB::table('profiles')->where('user_id', $user->id)->first();
        return view('profile.profile',['data' => $data, 'user'=> $user]);
    }

    public function edit($profile)
    {

        $data = DB::table('profiles')->where('user_id', $profile)->first();

        //        return dd($data);
        return view('profile.edit', ['profile' => $data]);
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'state' => ['required', 'string', 'max:25'],
            'town' => ['required', 'string', 'max:25'],
            'phone_number' =>['required','max:9'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $profile->update($request->all());
        return redirect(route('profile.index'));
    }
}
