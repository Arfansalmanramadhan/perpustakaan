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
            "name" =>"required |unique:catagories|max:200"
        ]);
        $ketegori = Catagory::create($request->all());
        return redirect("category");
    }
}
