@extends('layout.mainlayout')

@section('title', "Buku")
    
@section('content')
    <h1>Daftar buku</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="dihapus-buku" class="btn btn-secondary me-3">Lihat Data Terhapus</a>
        <a href="tambah-buku" class="btn btn-primary">Tambah Data</a>
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
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aktif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            @foreach ($item->catagories as $kategori)
                                {{$kategori->name}}
                            @endforeach                        
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="/edit-buku/{{$item->slug}}">Edit</a>
                            <a href="/hapus-buku/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection