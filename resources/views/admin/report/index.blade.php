@extends('layouts.admin')
@section('title')
    Report
@endsection
@section('container')
    <h5>5 data Obat terlaris dari data-data transaksi Anda</h5>
    <!-- content -->
    <div>
        @if (!empty($rTop5Medicine))
            <div class="table-responsive">
                <table class="table table-hover mt-3" style="font-size: 12px;">
                    <thead class="thead-color">
                        <tr>
                            <th>ID</th>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah Terjual</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($rTop5Medicine as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->generic_name }}</td>
                                <td>{{ $r->price }}</td>
                                <td>{{ $r->jumlahterjual }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <h5 class="mt-3"> - Belum ada data</h5>
        @endif
    </div>
    <br>
    <h5>3 data Customer yang paling banyak berbelanja dari sisi nominal pembelian</h5>
    <!-- content -->
    <div>
        @if (!empty($rTop3BuyerCustomer))
            <div class="table-responsive">
                <table class="table table-hover mt-3" style="font-size: 12px;">
                    <thead class="thead-color">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Nominal pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rTop3BuyerCustomer as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->address }}</td>
                                <td>{{ $r->email }}</td>
                                <td>Rp. {{ number_format($r->nominalpembelian, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h5 class="mt-3">- Belum ada data</h5>
        @endif
    </div>
    <!-- End of content -->
@endsection
