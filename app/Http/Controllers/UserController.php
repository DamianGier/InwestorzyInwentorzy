<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class UserController extends Controller
{
    //
//    public function index()
//    {
//
//        return view('profile.profile', ['profile' => User::findOrFail(auth()->id())]);
//    }



    public function password()
    {
        Password::sendResetLink(['email' => Auth::user()->email], function (Illuminate\Mail\Message $message) {
            $message->subject('Your Password Reset Link');
        });
        return redirect(route('profile.index'));
    }



}
