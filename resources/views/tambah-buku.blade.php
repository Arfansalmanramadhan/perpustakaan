@extends('layout.mainlayout')

@section('title', "Tambah Buku ")
@section('page-name', "Dashboard")
    
@section('content')
    <h1>Tambah Data Baru</h1>
    <div class="mt-5 w-50">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form  method="post" action="tambah-buku" enctype="">
            @csrf
            <div>
                <label for="name" class="form-label">Kode : </label>
                <input type="text" name="book_code" class="form-control" placeholder="Kode buku">
            </div>
            <div>
                <label for="name" class="form-label">Judul : </label>
                <input type="text" name="title" class="form-control" placeholder="Judul buku">
            </div>
            <div>
                <label for="name" class="form-label">cover : </label>
                <input type="file" name="cover" class="form-control"">
            </div>
            <div class="mt-4">
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
@endsection