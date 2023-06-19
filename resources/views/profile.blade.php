@extends('layout.mainlayout')

@section('title', "Profile")
    
@section('content')
    <div class="mt-5">
        <h1>Salamat Datang, {{Auth::user()->username}} daftar peminjaman buku anda</h1>
        <h2>Daftar Pinjam {{Auth::user()->username}}</h2>
        <x-pinjam-tabel :catatan='$catatan' />
    </div>
@endsection