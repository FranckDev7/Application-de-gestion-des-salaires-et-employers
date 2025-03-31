<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }

    public function handleLogin (AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withInput($request->only('email'))->with('error_msg', 'Informations d\'identification incorrectes.');
        }

    }


}
