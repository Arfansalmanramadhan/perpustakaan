@extends('layout.mainlayout')

@section('title', "Kategori")
{{-- @section('page-name', "Dashboard") --}}
    
@section('content')
    <h1>Daftar Kategori</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="dihapus-kategori" class="btn btn-secondary me-3">Lihat Data Terhapus</a>
        <a href="tambah-kategori" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="mt-5">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif 
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aktif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarKategori as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="/edit-kategori/{{$item->slug}}">Edit</a>
                            <a href="/hapus-kategori/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection