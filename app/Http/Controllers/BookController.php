<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catagory;
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
        $kategori = Catagory::all();
        return view("tambah-buku", ["kategori" => $kategori]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "book_code" => "required |unique:books|max:200",
            "title" => "required |max:200"
        ]);

        $namaBaru = '';
        if ($request->file('img')) {
            $extension = $request->file("img")->getClientOriginalExtension();
            $namaBaru = $request->title.'-'. now()->timestamp. '.'.$extension;
            $request->file("img")->storeAs('cover', $namaBaru);
        }
        // dd($namaBaru);
        $request['cover'] = $namaBaru;
        $Buku = Book::create($request->all());
        // dd($Buku);
        $Buku->Catagories()->sync($request->catagories);
        return redirect("books")->with("status", "Tambah Buku sukses");
    }
    public function edit(Request $request, $slug)
    {
        $buku = Book::where('slug', $slug)->first();
        $kategori = Catagory::all();
        return view("edit-buku", ["kategori" => $kategori, "buku" => $buku]);
    }
    public function update(Request $request, $slug)
    {
        $namaBaru = ''; 
        if ($request->file('img')) {
            $extension = $request->file("img")->getClientOriginalExtension();
            $namaBaru = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file("img")->storeAs('cover', $namaBaru);
        }
        $request['cover'] = $namaBaru;
        $buku = Book::where('slug', $slug)->first()
            ->update($request->all());
        if ($request->catagoris) {
            $buku->Catagories()->sync($request->catagories);
        }
        return redirect("books")->with("status", "edit Buku sukses");
    }
    public function hapus($slug)
    {
        $buku = Book::where('slug', $slug)->first();
        return view("hapus-buku", ["buku" => $buku]);
        // dd($slug);  
    }
    public function hapuss($slug)
    {
        $kategori = Book::where('slug', $slug)
            ->first()
            ->delete();
        return redirect("books")->with("status", "Hapus Buku sukses");
    }
    public function hapusss()
    {

        $lihatdataterhapus = Book::onlyTrashed()->get();
        // dd($lihatdataterhapus);
        return view("lihatdatabukudihapus", ["lihatdataterhapus" => $lihatdataterhapus]);
    }
    public function memulihkan($slug)
    {
        $kategori = Book::withTrashed()
            ->where("slug", $slug)
            ->first()
            ->restore();
        return redirect("books")->with("status", "Memulihkan Buku sukses");
    }
}
