<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return view("profile");
        // $request->session()->flush();
    }
    public function user()
    {
        $user = User::where("role_id", 2)
            ->where('status', 'active')
            ->get();
        return view("user", ["user" => $user]);
    }
    public function register()
    {
        $register = User::where('status', 'inactive')
            ->where("role_id", 2)
            ->get();
        return view("regsterPengguna", ["register" => $register]);
    }
}
