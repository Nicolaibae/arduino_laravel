<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function login(){
        return view('user.auth.login');

    }
    public function login_user(Request $request){

        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with([
                'success' => 'Đăng nhập thành công '
            ]);
        } else {
            return redirect()->route('login')->with([
                'error' => 'Thông tin đăng nhập không chinh xác'
            ]);
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with(['success' => 'Bạn đã đăng xuất thành công!']);
    }

}
