@extends('layout.mainlayout')

@section('title', "Dashboa")
    
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-lg-3 col-md-4 col-sm-6 md-3">
                <div class="card" >
                    <img src="{{asset('img/bggambar.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text text-end">in stok</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection