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
        <form  method="post" action="tambah-buku" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="book_code" class="form-label">Kode : </label>
                <input type="text" name="book_code" class="form-control" placeholder="Kode buku" value="{{old("book_code")}}">
            </div>
            <div>
                <label for="title" class="form-label">Judul : </label>
                <input type="text" name="title" class="form-control" placeholder="Judul buku" value="{{old("title")}}">
            </div>z
            <div>
                <label for="img" class="form-label">Kover : </label>
                <input type="file" name="cover" class="form-control"">
            </div>
            <div class="mt-4">
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
@endsection