@extends('layouts.admin')
@section('title')
    Data Pembeli
@endsection
@section('container')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index:-1;">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- content -->
    <div>
        <h3>Riwayat Transaksi</h3>
        <p>Kode User: {{ $user[0]->id }} | Nama User: {{ $user[0]->name }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> back</a>
        <div class="table-responsive mt-3">
            <div>
                <table id="cart" class="table table-hover table-condensed mt-3">
                    <thead>
                    <tr>
                        <th style="width:45%">Obat</th>
                        <th style="width:15%">Harga</th>
                        <th style="width:8%">Jumlah</th>
                        <th style="width:22%">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $ts = $transactiondata->medicines; ?>
                        @foreach($ts as $t)
                            <tr>
                                <td data-th="Obat">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="{{ asset('images/'.$t->image) }}" alt="" width="100" height="100">
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="nomargin"> {{ $t->generic_name }}</h5>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Harga">Rp. {{ number_format($t->price,2,",",".") }}</td>
                                <td data-th="Jumlah">{{ $t->pivot->quantity }}</td>
                                <td data-th="Subtotal">Rp. {{ number_format($t->pivot->subtotal,2,",",".") }}</td>
                                <td class="actions"></td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End of content -->
@endsection