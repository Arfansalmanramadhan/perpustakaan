<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $catatanPinjam = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view("profile", ["catatan" => $catatanPinjam]);
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
        $catatanPinjam = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user-detail', ["user" => $user, "catatan" => $catatanPinjam]);
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
