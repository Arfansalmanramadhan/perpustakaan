@extends('layout.mainlayout')

@section('title', "Tambah kategori ")
@section('page-name', "Dashboard")
    
@section('content')
    <h1>Tambah Data Baru</h1>
    <div class="mt-5 w-50">
        <form action="#" method="post">
            <div>
                <label for="name" class="form-label">Nama : </label>
                <input type="text" name="name" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="mt-4">
                <input type="button" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
@endsection