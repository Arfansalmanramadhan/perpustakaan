<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $daftarKategori = Catagory::all();
        return view("category", ["daftarKategori" => $daftarKategori]);
    }
    public function tambah()
    {
        return view("tambah-kategori");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required |unique:catagories|max:200"
        ]);
        $ketegori = Catagory::create($request->all());
        return redirect("kategori")->with("status", "Tambah Kategri sukses");
    }
    public function edit($slug)
    {
        $kategorii = Catagory::where('slug', $slug)->first();
        return view("edit-kategori", ["kategori" => $kategorii]);
        // dd($request->all());
    }
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            "name" => "required |unique:catagories|max:200"
        ]);
        $kategori = Catagory::where("slug", $slug)
            ->first();
        $kategori->slug = null;
        $kategori->update($request->all());
        return redirect("kategori")->with("status", "Edit Kategri sukses");
    }
    public function hapus($slug)
    {
        $kategori = Catagory::where('slug', $slug)->first();
        return view("hapus-kategori", ["kategori" => $kategori]);
        // dd($slug);  
    }
    public function hapuss($slug)
    {
        $kategori = Catagory::where('slug', $slug)
            ->first()
            ->delete();
        return redirect("kategori")->with("status", "Hapus Kategri sukses");
    }
    public function hapusss()
    {
        $lihatdataterhapus = Catagory::onlyTrashed()->get();
        // dd($lihatdataterhapus);
        return view("lihatdatakategoriterhapus", ["lihatdataterhapus" => $lihatdataterhapus]);
    }
    public function memulihkan($slug)
    {
        $kategori = Catagory::withTrashed()
            ->where("slug", $slug)
            ->first()
            ->restore();
        return redirect("kategori")->with("status", "Memulihkan Kategri sukses");
    }
}
