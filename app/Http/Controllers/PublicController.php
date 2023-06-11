<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $buku = Book::all();
        return view("daftar-buku", ["buku" => $buku]);
    }
}
