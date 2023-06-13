@extends('layout.mainlayout')

@section('title', "Pinjam Buku")
    
@section('content')
    <div class="container col-12 col-md-8 offser-md-2 col-lg-6  offser-md-3 ">
        <h1 class="md-3">Peminjam</h1>
        <form action="" method="post">
            <div class="md-3">
                <label for="perngguna" class="form-label">Pengguna</label>
                <select name="pengguna" id="" class="form-control">
                    <option value="">Pilih Pengguna</option>
                    @foreach ($pengguna as $item)
                        <option value="{{$item->id}}">{{$item->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-3">
                <label for="perngguna" class="form-label">Buku</label>
                <select name="buku" id="buku" class="form-control"></select>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
@endsection