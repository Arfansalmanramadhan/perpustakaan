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
        $validated = $request->validate([
            "book_code" => "required |unique:books|max:200",
            "title" => "required |max:200"
        ]);

        $namaBaru = '';
        if ($request->file('cover')) {
            $extension = $request->file("cover")->getClientOriginalExtension();
            $namaBaru = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file("cover")->storeAs('cover', $namaBaru);
        }
        $request['cover'] = $namaBaru;
        $Buku = Book::create($request->all());
        return redirect("books")->with("status", "Tambah Buku sukses");
    }
}
