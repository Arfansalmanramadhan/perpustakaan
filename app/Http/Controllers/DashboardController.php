<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Catagory;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahBuku = Book::count();
        $jumlahKategori = Catagory::count();
        $jumlahpengguna = User::count();
        $jumlahpenggunaa = User::where("role_id", 2)->first();
        $catatanPinjam = RentLogs::with(['user', 'book'])->where('user_id', $jumlahpenggunaa->id)->get();
        return view("dashboard", ["jumlah_buku" => $jumlahBuku, "jumlah_kategoori" => $jumlahKategori, "jumlah_pengguna" => $jumlahpengguna, "catatan" => $catatanPinjam]);
    }
}
