@extends('layout.mainlayout')

@section('title', "category")
    
@section('content')
    <h1>Daftar log peminjaman</h1>

    <div class="mt-5">
        <x-pinjam-tabel :catatan='$catatan' />
    </div>
@endsection