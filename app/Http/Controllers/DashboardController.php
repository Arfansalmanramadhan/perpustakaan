<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catagory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahBuku = Book::count();
        $jumlahKategori = Catagory::count();
        $jumlahpengguna = User::count();
        return view("dashboard", ["jumlah_buku" => $jumlahBuku, "jumlah_kategoori" => $jumlahKategori, "jumlah_pengguna" => $jumlahpengguna]);
    }
}
