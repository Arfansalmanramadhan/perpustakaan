@extends('layout.mainlayout')

@section('title', "category")
@section('page-name', "Dashboard")
    
@section('content')
    <h1>Daftar Kategori</h1>
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
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection