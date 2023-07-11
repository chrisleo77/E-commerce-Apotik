@extends('layouts.index')
@section('container')
    <div class="mt-3">
        <a href="{{ url('/') }}" class="btn"><i class="fa fa-angle-left"></i> back to home</a>
        <h3 class="mt-3">Riwayat Transaksi</h3>
        @if ($count[0]->count > 0)
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
                        @foreach ($listtransactions as $t)
                            <tr>
                                <td data-th="Kode">{{ $t->id }}</td>
                                <td data-th="Waktu">{{ $t->transaction_date }}</td>
                                <td data-th="Total">Rp. {{ number_format($t->total, 2, ',', '.') }}</td>
                                <td class="actions">
                                    <a class="btn btn-info" href="{{ route('transaksi.show', $t->id) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div>
                <p>Anda belum pernah melakukan transaksi apapun</p>
            </div>
        @endif
    </div>
@endsection
