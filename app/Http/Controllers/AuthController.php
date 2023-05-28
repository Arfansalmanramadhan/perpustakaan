<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view("login");
    }
    public function register()
    {
        return view("register");
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        // apakah login aktif

        if (Auth::attempt($credentials)) {
            // apahak user active
            if (Auth::user()->status != 'active') {
                Session::flash("status", "failed");
                Session::flash("message", "akun kamu tidak terdaftar, tolong hubungin admin");
                return redirect("/login");
            }
            $request->session()->regenerate();
            if (Auth::user()->roles_id == 1) {
                return redirect("dashboard");
            }
            // $request->session()->regenerate();
            if (Auth::user()->roles_id == 2) {
                return redirect("profile");
            }
            // dd(Auth::user());

            // return redirect()->intended("dashboard");
        }
        Session::flash("status", "failed");
        Session::flash("message", "akun kamu tidak terdaftar");
        return redirect("/login");
    }
}
