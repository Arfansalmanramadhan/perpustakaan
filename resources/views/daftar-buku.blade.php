@extends('layout.mainlayout')

@section('title', "Dashboa")
    
@section('content')

    <form action="" method="get">
    <div class="row">
        <div class="col-12 col-sm-6">
            <select name="catagori" id="catagori" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari judul buku " aria-label="Recipient's username" aria-describedby="basic-addon2" name="title">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
        <div class="row ">
            @foreach ($buku as $item)
                
                <div class="col-lg-3 col-md-4 col-sm-6 md-3">
                    <div class="card h-100" >
                        <img src="{{asset('storage/cover/'.$item->cover)}}" class="card-img-top" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->book_code}}</h5>
                            <p class="card-text">{{$item->title}}</p>
                            <p class="card-text text-end fw-bold {{$item->status == 'In stock' ? 'text-success' : 'text-danger'}}">{{$item->status}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection