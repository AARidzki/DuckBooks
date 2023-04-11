@extends('layouts.main')

@section('container')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Pesanan Diterima</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="">Invoice</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Order Details Area =================-->
<section class="order_details p_120">
    <div class="container">
        <h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Informasi Pesanan</h4>
                    <ul class="list">
                        <li>
                            <a href="#">
                                <span>Invoice</span> : {{ $orders->invoice }}</a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Tanggal</span> : {{ $orders->created_at }}</a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Total</span> : Rp {{ number_format($orders->subtotal) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Informasi Pemesan</h4>
                    <ul class="list">
                        <li>
                            <a href="#">
                                <span>Alamat</span> : {{ $orders->customer_address }}</a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Country</span> : Indonesia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
