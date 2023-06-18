@extends('layout.mainlayout')

@section('title', "Profile")
    
@section('content')
    <div class="mt-5">
        <h2>Log Pinjam Penguna</h2>
        <x-pinjam-tabel :catatan='$catatan' />
    </div>
@endsection