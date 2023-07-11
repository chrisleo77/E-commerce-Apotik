@extends('layouts.index')
@section('container')
<h5 class="mt-3">Semua Produk</h5>
<div class="container">
    <div class="row mt-3">
        @foreach($listMedicines as $li)
        <div class="col-xs-18 col-sm-6 col-md-3 text-center">
            <div class="thumbnail">
                <a href="{{ url('obat/'.$li->id) }}" class="text-dark text-decoration-none">
                    <img src="{{ asset('images/'.$li->image) }}" alt="" style="width:100%; height: 230px; border-radius: 10px;">
                    <div class="caption p-3">
                        <h5>{{ $li->generic_name }}</h5>
                        <p>Rp. {{ number_format($li->price,2,",",".") }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection