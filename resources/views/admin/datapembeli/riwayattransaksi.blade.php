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
        <a href="{{ url('admin/datapembeli') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> back</a>
        @if($count[0]->count > 0)
        <div class="table-responsive mt-3">
            <div>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:10%">Kode</th>
                        <th style="width:50%">Waktu Transaksi</th>
                        <th style="width:30%">Total</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($listtransactions as $t)
                            <tr>
                                <td data-th="Kode">{{ $t->id }}</td>
                                <td data-th="Waktu">{{ $t->transaction_date }}</td>
                                <td data-th="Total">Rp. {{ number_format($t->total,2,",",".") }}</td>
                                <td class="actions">
                                    <a class="btn btn-info" href="{{ url('admin/riwayattransaksi/detail',$t->id) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else 
            <div class="mt-3">
                <p>User belum pernah melakukan transaksi apapun</p>
            </div>
            @endif
        </div>
    </div>
    <!-- End of content -->
@endsection