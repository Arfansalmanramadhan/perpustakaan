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
        return redirect("user-detail/" . $slug)->with("status", "Menetujui perngguna sukses");
    }
    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return  view('hapus-user', ["user" => $user]);
    }
    public function hapus($slug)
    {
        $user = User::where('slug', $slug)
            ->first()
            ->delete();
        return redirect("user")->with("status", "Hapus pengguna sukses");
    }
    public function lihat()
    {
        $lihatdataterhapus = User::onlyTrashed()->get();
        return view("lihatdatauserdihapus", ["lihatdataterhapus" => $lihatdataterhapus]);
    }
    public function memulihkan($slug)
    {
        $user = User::withTrashed()
            ->where("slug", $slug)
            ->first()
            ->restore();
        return redirect("user")->with("status", "Memulihkan user sukses");
    }
}
    