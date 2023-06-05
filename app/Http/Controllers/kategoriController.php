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
}
