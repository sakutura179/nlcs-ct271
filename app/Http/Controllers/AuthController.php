<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = ['username' => $request['username'], 'password' => $request['pass']];
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin-home', ['id' => $request['username']]);
        }
        if (Auth::guard('author')->attempt($data)) {
            return redirect()->route('author-home', ['id' => $request['username']]);
        }
        if (Auth::guard('viewer')->attempt($data)) {
            // return redirect()->route('viewer-home', ['id' => $request['username']]);
            return redirect()->route('mainPage');
        }
        return redirect()->route('login')->with('alert', 'Sai thông tin tài khoản hoặc mật khẩu.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('mainPage');
    }
}
