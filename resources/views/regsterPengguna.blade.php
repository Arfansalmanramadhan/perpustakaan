@extends('layout.mainlayout')

@section('title', "Pengguna")
    
@section('content')
    <h1>Daftar perngguna baru </h1>
    <div class="mt-5 d-flex justify-content-end">
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
                            <a href="/user-detail/{{$item->slug}}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection