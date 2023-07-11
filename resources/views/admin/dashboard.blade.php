@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('user')
<p class="pl-2">Hi, Andi</p>
@endsection
@section('container')
<!-- Content -->
<div>
    <!-- Summary Data -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Obat</h6>
                  <hr>
                  <h3>{{ $TotalMedicines }}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Kategori Obat</h6>
                  <hr>
                  <h3>{{ $TotalCategories }}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Transaksi</h6>
                  <hr>
                  <h3>{{ $TotalTransactions }}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                  <h6 class="card-title">Total User</h6>
                  <hr>
                  <h3>{{ $TotalUsers[0]->TotalUsers }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Summary Data -->
    <br>
</div>
<!-- End of Content -->
@endsection