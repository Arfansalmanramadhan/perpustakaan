<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pempinjamController extends Controller
{
    public function index()
    {
        return view("pempinjam");
    }
}
