<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catagory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Catagory::all();
        // dd($request->all());
        if ($request->catagori || $request->title) {
            $buku = Book::where('title', 'like', '%' . $request->title . '%')
                    ->orWhereHas('catagories', function ($a) use ($request) {
                        $a->where("catagories.id", $request->catagori);
                    })->get();
            // $buku = Book::whereHas('catagories', function ($a) use ($request) {
            //     $a->where("catagories.id", $request->catagori);
            // })->get();
        } else {
            $buku = Book::all();
        }
        return view("daftar-buku", ["buku" => $buku, "kategori" => $kategori]);
    }
}
