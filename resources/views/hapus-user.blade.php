@extends('layout.mainlayout')

@section('title', "Hapus Pengguna ")
@section('page-name', "Dashboard")
    
@section('content')
    <h2>Apakah kamu yakin akan hapus data {{$user->username}}</h2>
    <div class="mt-5">
        <a href="/user-hapus/{{$user->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/user" class="btn btn-primary">Tidak</a>
    </div>
@endsection 