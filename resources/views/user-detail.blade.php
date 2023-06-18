@extends('layout.mainlayout')

@section('title', "Pengguna")
    
@section('content')
    <h1>Detail user</h1>
    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == "inactive")
            <a href="/user-approve/{{$user->slug}}" class="btn btn-info">Menyetujui Pernggua</a>
        @endif
    </div>
    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif 
    </div>
    <div class="my-5 w-50">
        <div class="md-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{$user->username}}" >
        </div>
        <div class="md-3">
            <label for="username" class="form-label">No Telepon</label>
            <input type="text" class="form-control" readonly value="{{$user->phone}}" >
        </div>
        <div class="md-3">
            <label for="username" class="form-label">Alamat</label>
            <textarea style="resize: none" cols="7" rows="7 "class="form-control">{{$user->address}}</textarea>
        </div>
        <div class="md-3">
            <label for="username" class="form-label">Sebagai</label>
            <input type="text" class="form-control" readonly value="{{$user->status}}" >
        </div>
    </div>

    <div class="mt-5">
        <h2>Log Pinjam Penguna</h2>
        <x-pinjam-tabel :catatan='$catatan' />
    </div>
@endsection