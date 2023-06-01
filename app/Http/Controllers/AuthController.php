<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerate();
                Session::flash("status", "failed");
                Session::flash("message", "akun kamu tidak terdaftar, tolong hubungin admin");
                return redirect("/login");
            }
            $request->session()->regenerate();
            if (Auth::user()->roles_id == 1) {
                return redirect("dashboard");
            } else {
                return redirect("profile");
            }
        }
        Session::flash("status", "failed");
        Session::flash("message", "akun kamu tidak terdaftar");
        return redirect("/login");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect("login");
    }
    public function registerproses(Request $request)
    {
        $validated = $request->validate([
            "username" => "required|unique:users|max:255",
            "password" => "required|max:255",
            "phone" => "max:255",
            "address" => "required",
        ]);
        $request["password"] = Hash::make($request->password);
        // dd($request->password);
        $user = User::create($request->all());

        Session::flash("status", "sukses");
        Session::flash("message", "sukses registasi");
        return redirect("register");
    }
}
