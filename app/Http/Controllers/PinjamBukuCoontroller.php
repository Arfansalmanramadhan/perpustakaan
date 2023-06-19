<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PinjamBukuCoontroller extends Controller
{
    public function index()
    {
        $pengguna = User::where('id', '!=', 1)->where('status', '!=', "inactive")->get();
        $buku = Book::all();
        return view("pinjambuku", ['pengguna' => $pengguna, 'buku' => $buku]);
    }
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        // dd($request->all());

        $buku = Book::findOrFail($request->book_id)->only("status");
        // dd($buku);
        if ($buku['status'] != "In stock") {
            Session::flash("message", "buku tidak tersedia");
            Session::flash("alert-class", "alert-danger");
            return redirect("pinjambuku");
        } else {
            $hitung = RentLogs::where('user_id', $request->user_id)
                ->where('actual_return_date', null)
                ->count();
            if ($hitung >= 3) {
                Session::flash("message", "Pengguna telah mencapai batah buku");
                Session::flash("alert-class", "alert-danger");
                return redirect("pinjambuku");
            } else {
                try {
                    DB::beginTransaction();

                    RentLogs::create($request->all());
                    $buku = Book::findOrFail($request->book_id);
                    $buku->status = 'Not available';
                    $buku->save();
                    DB::commit();
                    Session::flash("message", "Pinjam buku sukses");
                    Session::flash("alert-class", "alert-success");
                    return redirect("pinjambuku");
                } catch (\Throwable $th) {
                    DB::rollBack();
                    // dd($th);
                }
            }
        }
    }
    public function pengembalianbuku()
    {
        $pengguna = User::where('id', '!=', 1)->where('status', '!=', "inactive")->get();
        $buku = Book::all();
        return view("pengembalianbuku", ['pengguna' => $pengguna, 'buku' => $buku]);
    }
    public function store2(Request $request)
    {
        $kembali = RentLogs::where("user_id", $request->user_id)->where("book_id", $request->book_id)->where("actual_return_date", null);
        $tanggalPinjam = $kembali->first();
        $megitungTanggal = $kembali->count();

        if ($megitungTanggal == 1) {
            $tanggalPinjam->actual_return_date = Carbon::now()->toDateString();
            // $tanggalPinjam->return_date = Carbon::now()->isPast();
            $tanggalPinjam->save();
            Session::flash("message", "Pengembalian buku sukses");
            Session::flash("alert-class", "alert-success");
            return redirect("pengembalianbuku");
            // dd($tanggalPinjam);
        } else {
            Session::flash("message", "Ada kesalahan dalam proses");
            Session::flash("alert-class", "alert-danger");
            return redirect("pengembalianbuku");
        }
    }
}
