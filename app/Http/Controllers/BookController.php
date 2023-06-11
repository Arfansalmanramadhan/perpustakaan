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
        $validated = $request->validate([
            "book_code" => "required |unique:books|max:200",
            "title" => "required |max:200"
        ]);

        $namaBaru = '';
        if ($request->file('cover')) {
            $extension = $request->file("cover")->getClientOriginalExtension();
            $namaBaru = $request->title.'-'. now()->timestamp.'.'.$extension;
            $request->file("cover")->storeAs('cover', $namaBaru);
        }
        $request['cover'] = $namaBaru;
        $Buku = Book::create($request->all());
        $Buku->Catagories()->sync($request->catagories);
        return redirect("books")->with("status", "Tambah Buku sukses");
    }
    public function edit(Request $request, $slug)
    {
        $buku = Book::where('slug', $slug)->first();
        $kategori = Catagory::all();
        return view("edit-buku", ["kategori"=> $kategori, "buku"=>$buku]);
    }
    public function update(Request $request, $slug)
    {
        $namaBaru = '';
        if ($request->file('cover')) {
            $extension = $request->file("cover")->getClientOriginalExtension();
            $namaBaru = $request->title.'-'. now()->timestamp.'.'.$extension;
            $request->file("cover")->storeAs('cover', $namaBaru);
        }
        $request['cover'] = $namaBaru;
        $buku = Book::where('slug', $slug)->first()
                ->update($request->all());
        if($request->catagoris){
            $buku->Catagories()->sync($request->catagories);
        }
        return redirect("books")->with("status", "edit Buku sukses");
    }
    
}
