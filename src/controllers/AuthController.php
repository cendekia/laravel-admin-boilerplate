<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
// use App\Http\Requests\Admin\SignInRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignIn()
    {
    	return view('admin-view::signin');
    }

    public function postSignIn(Request $request)
    {
        if (!\Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(admin_url('signin'));
        }

        return redirect(admin_url('/'));
    }

    public function getSignOut()
    {
        \Auth::logout();

        return redirect(admin_url('signin'));
    }
}
