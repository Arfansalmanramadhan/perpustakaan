@extends('layout.mainlayout')

@section('title', "Pengguna")
    
@section('content')
    <h1>Daftar perngguna baruv </h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="@" class="btn btn-secondary me-3">Lihat melarang pengguna</a>
        <a href="/user" class="btn btn-primary">Lihat register baru</a>
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
                @foreach ($register as $item)
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