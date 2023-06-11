@extends('layout.mainlayout')

@section('title', "hapus buku ")
@section('page-name', "Dashboard")
    
@section('content')
    <h2>Apakah kamu yakin akan hapus data {{$buku->title}}</h2>
    <div class="mt-5">
        <a href="/hapuss-buku/{{$buku->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/books" class="btn btn-primary">Tidak</a>
    </div>
@endsection 