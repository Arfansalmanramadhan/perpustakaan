<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view("book", ["books" => $books]);
    }
    public function tambah()
    {
        return view("tambah-buku");
    }
    public function store(Request $request)
    {
        $Buku = Book::create($request->all());
        return redirect("books")->with("status", "Tambah Buku sukses");
    }
}
