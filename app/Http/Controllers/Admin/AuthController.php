<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check())
        {
            return redirect(route('admin.index'));
        }
        else {
            return view('admin.auth.login');
        }
    }
    public function login()
    {
    //    dd(Hash::make('123'));
        $user = Admin::where('email', \request('email'))->first();
        $card = ['email'=>\request('email'), 'password'=>\request('password')];

        if (\auth()->guard('admin')->attempt($card, false))
        {
            \auth()->guard('admin')->login($user);
            return redirect(route('admin.index'));
        } else {
            Session::flash('error','  يوجد خطأ في البيانات الرجاء التأكد من البريد الالكتروني وكلمه المرور');
            return back();
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect(url('admin/login'));
    }
}
