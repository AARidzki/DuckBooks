@extends('dashboard.layouts.main')

@section('container')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Pesanan Diterima</h2>
                {{-- <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="">Invoice</a>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Order Details Area =================-->
<section class="order_details p_120">
    <div class="container">
        <h3 class="title_confirmation text-center text-success mb-5">Terima kasih, pesanan anda telah kami terima.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-6">
                <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h4>Informasi Pesanan</h4>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            
                                <span>Invoice</span> : {{ $orders->invoice }}
                        </li>
                        <li class="list-group-item">
                            
                                <span>Tanggal</span> : {{ $orders->created_at }}
                        </li>
                        <li class="list-group-item">
                            
                                <span>Total</span> : Rp {{ number_format($orders->subtotal) }}
                        </li>
                    </ul>
                </div>
            </div>
        
            <div class="col-lg-6">
                <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h4>Informasi Pemesan</h4>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            
                                <span>Alamat</span> : {{ $orders->user_address }}
                        </li>
                        <li class="list-group-item">
                            
                                <span>Country</span> : Indonesia
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
