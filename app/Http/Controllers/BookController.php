<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // dd("halaman book");
        $request->session()->flush();
    }
}
