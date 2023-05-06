@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-6">
    <h1>Informasi Pengiriman</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

        <form action="{{ route('front.store_checkout') }}" method="POST">
            @csrf
            @foreach ($users as $user)
            
            <input type="hidden" class="form-control mb-3" name="user_id" placeholder="ID User" required value="{{ $user->id }}">
            <input type="text" class="form-control mb-3" name="user_name" placeholder="Nama Lengkap" required value="{{ $user->name }}">
            <p class="text-danger">{{ $errors->first('user_name') }}</p>
            <input type="text" class="form-control mb-3" name="user_phone" placeholder="No Telepon" required value="{{ $user->notelp }}">
            <input type="text" class="form-control mb-3" name="email" placeholder="Email" required value="{{ $user->email }}">
            <input type="text" class="form-control mb-3" name="user_address" placeholder="Alamat Lengkap" required value="{{ $user->address }}">
                
            @endforeach
        </div>
    </div>

            <div class="row">
                <div class="col-lg-4">

                        <h2>Ringkasan Pesanan</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                                <div class="d-flex">
                                    @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ \Str::limit($cart['name'], 10) }}</td>
                                        <td>x {{ $cart['qty'] }}</td>
                                        <td>Rp
                                            {{ number_format($cart['price']) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Subtotal</td>
                                        <td></td>
                                        <td>Rp {{ number_format($subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pengiriman</td>
                                        <td></td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td>Rp {{ number_format($subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary">Bayar Pesanan</button>
                                        </td>
                                    </tr>
                                </div>
                            
                            </table>
                        </div>
                        {{-- <ul class="list">
                            <li>
                                <a href="/books">Buku
                                    <span>Total</span>
                                </a>
                            </li>
                            @foreach($carts as $cart)
                                <li>
                                    <a href="#">{{ \Str::limit($cart['name'], 10) }}
                                        <span class="middle">x {{ $cart['qty'] }}</span>
                                        <span class="last">Rp
                                            {{ number_format($cart['price']) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Subtotal
                                    <span>Rp {{ number_format($subtotal) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Pengiriman
                                    <span>Rp 0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Total
                                    <span>Rp {{ number_format($subtotal) }}</span>
                                </a>
                            </li>
                        </ul>
                        <button class="main_btn">Bayar Pesanan</button>
                    </div>

            </div> --}}


        </form>



@endsection
