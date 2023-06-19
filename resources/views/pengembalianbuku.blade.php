@extends('layout.mainlayout')

@section('title', "Pengembalian Buku")
    
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="container col-12 col-md-8 offser-md-2 col-lg-6  offser-md-3 ">
        <h1 class="md-3">Pengembalian buku</h1>
        <div class="mt-5">
            @if (session('message'))
            <div class="alert {{session('alert-class')}}">
                {{ session('message') }}
            </div>
            @endif 
        </div>
        <form action="" method="post">
            @csrf
            <div class="md-3">
                <label for="perngguna" class="form-label">Pengguna</label>
                <select name="user_id" id="" class="form-control penggunabuku">
                    <option value="">Pilih Pengguna</option>
                    @foreach ($pengguna as $item)
                        <option value="{{$item->id}}">{{$item->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-3">
                <label for="perngguna" class="form-label">Buku</label>
                <select name="book_id" id="buku" class="form-control buku">
                    <option value="">Pilih Buku</option>
                    @foreach ($buku as $item)
                        <option value="{{$item->id}}">{{$item->book_code}} {{$item->title}}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.penggunabuku').select2();
            $('.buku').select2();
        });
    </script>
@endsection