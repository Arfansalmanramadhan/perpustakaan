<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class pempinjamController extends Controller
{
    public function index()
    {
        $catatanPinjam = RentLogs::with(['user', 'book'])->get();
        return view("pempinjam", ["catatan" => $catatanPinjam]);
    }
}
