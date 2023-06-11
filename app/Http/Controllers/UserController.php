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
    public function detail($slug)
    {
        // dd($slug);
        $user = User::where('slug', $slug)
            ->first();
        return view('user-detail', ["user" => $user]);
    }
    public function menyetujui($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect("user-detail/" . $slug)->with("status", "aktif perngguna sukses");
    }
}
