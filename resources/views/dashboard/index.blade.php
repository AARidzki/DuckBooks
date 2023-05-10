@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-center mb-5">Harga Pesanan</h5>
                      <p class="card-text text-center mb-5">Rp </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-center mb-5">Total</h5>
                      <p class="card-text text-center mb-5">Rp </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-center mb-5">Status</h5>
                      <p class="card-text text-center mb-5">Rp </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
