@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-6">
    <h1>Informasi Pengiriman</h1>
        <form action="" method="POST">
            @csrf
            <input type="text" class="form-control mb-3" name="name" placeholder="Nama Lengkap">
            <input type="text" class="form-control mb-3" name="notelp" placeholder="No Telepon">
            <input type="text" class="form-control mb-3" name="email" placeholder="Email">
            <input type="text" class="form-control mb-3" name="alamat" placeholder="Alamat Lengkap">
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
