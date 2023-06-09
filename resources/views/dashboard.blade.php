@extends('layout.mainlayout')

@section('title', "Dashboa")
    
@section('content')

    <h1>Salamat Datang, {{Auth::user()->username}}</h1>
    <div class="row">
        <div class="col-md-4 mt-5">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="dex">Buku</div>
                        <div class="jumlah">{{$jumlah_buku}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-check"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="dex">Kategori</div>
                        <div class="jumlah">{{$jumlah_kategoori}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card-data">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="dex">user</div>
                        <div class="jumlah">{{$jumlah_pengguna}}</div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="mt-5">
        <h2>Log Pinjam Buku</h2>
        <x-pinjam-tabel :catatan='$catatan' />
    </div>
@endsection