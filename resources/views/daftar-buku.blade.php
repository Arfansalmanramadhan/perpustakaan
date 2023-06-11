@extends('layout.mainlayout')

@section('title', "Dashboa")
    
@section('content')

    <div class="container">
        <div class="row ">
            @foreach ($buku as $item)
                
                <div class="col-lg-3 col-md-4 col-sm-6 md-3">
                    <div class="card" >
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