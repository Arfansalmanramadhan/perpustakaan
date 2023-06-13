<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamBukuCoontroller extends Controller
{
    public function index()
    {
        $pengguna = User::where('id', '!=', 1)->get();
        $buku = Book::all();
        return view("pinjambuku", ['pengguna' => $pengguna, 'buku' => $buku]);
    }
}
