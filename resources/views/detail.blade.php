@extends('layouts.index')
@section('container')
<br>
    <a href="{{ url('/') }}" class="btn"><i class="fa fa-angle-left"></i> back to home</a>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" id="btnclose" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <script>
                setTimeout(function() {
                    document.querySelector("#btnclose").click();
                }, 2000);
            </script>
        </div>
    @endif
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('images/' . $medicine->image) }}" alt=""
                    style="width:100%; height: 250px; border-radius: 10px;">
            </div>
            <div class="col-9 p-3">
                <h3>{{ $medicine->generic_name }}</h3>
                <h6>Rp. {{ number_format($medicine->price, 2, ',', '.') }}</h6>
                <p class="btn-holder"><a href="{{ url('add-to-cart/' . $medicine->id) }}" class="btn btn-dark mt-3 mb-3"
                        role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah ke keranjang</a> </p>
                <p>{{ $medicine->description }}</p>
            </div>
        </div>
    </div>
@endsection
