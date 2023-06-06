@extends('layout.mainlayout')

@section('title', "hapus Kategori ")
@section('page-name', "Dashboard")
    
@section('content')
    <h2>Apakah kamu yakin akan hapus data {{$kategori->name}}</h2>
    <div class="mt-5">
        <a href="/hapuss-kategori/{{$kategori->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/kategori" class="btn btn-primary">Tidak</a>
    </div>
@endsection 