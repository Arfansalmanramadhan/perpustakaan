@extends('layout.mainlayout')

@section('title', "category")
    
@section('content')
    <h1>user</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="dihapus-kategori" class="btn btn-secondary me-3">Lihat melarang pengguna</a>
        <a href="tambah-kategori" class="btn btn-primary">Lihat register baru</a>
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td>
                            @if ($item->phone)
                                {{$item->phone}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/edit-buku/{{$item->slug}}">Edit</a>
                            <a href="/hapus-buku/{{$item->slug}}">Melarang Perngguna</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection