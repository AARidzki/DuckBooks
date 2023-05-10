@extends('layouts.main')

@section('container')
     <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Keranjang Belanja</h2>
					<div class="page_link mb-5">
                        {{-- <a href="{{ route('front.list_cart') }}">Cart</a> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
        
        <!-- DISABLE BAGIAN INI JIKA INGIN MELIHAT HASILNYA TERLEBIH DAHULU -->
        <!-- KARENA MODULENYA AKAN DIKERJAKAN PADA SUB BAB SELANJUTNYA -->
        <!-- HANYA SAJA DEMI KEMUDAHAN PENULISAN MAKA SAYA MASUKKAN PADA BAGIAN INI -->
                <form action="{{ route('front.update_cart') }}" method="post">
                    @csrf
        <!-- DISABLE BAGIAN INI JIKA INGIN MELIHAT HASILNYA TERLEBIH DAHULU -->
                  
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
              <!-- LOOPING DATA DARI VARIABLE CARTS -->
			 
                            @foreach ($carts as $row)
							
							
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
                                            <img src="{{ asset('storage/' . $row['image']) }}" width="100px" height="100px" alt="{{ $row['name'] }}">
										</div>
										<div class="media-body">
                                            <p>{{ $row['name'] }}</p>
										</div>
									</div>
								</td>
								<td>
                                    <h5>Rp {{ number_format($row['price']) }}</h5>
								</td>
								<td>
									<div class="product_count">
                    
                    
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                                        <input type="text" name="qty[]" id="sst{{ $row['id'] }}" maxlength="12" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty">
                                        <input type="hidden" name="id[]" value="{{ $row['id'] }}" class="form-control id">
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                    
                    
										<button onclick="var result = document.getElementById('sst{{ $row['id'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="increase items-count" type="button">
											 <i class="bi bi-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst{{ $row['id'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">
										 	<i class="bi bi-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
                                    <h5>Rp {{ number_format($row['price'] * $row['qty']) }}</h5>
								</td>
                            </tr>
							
				
							@endforeach
							<tr class="bottom_button">
								<td>
									<button class="btn btn-secondary">Update Cart</button>
								</td>
								<td></td>
								<td></td>
								<td></td>
                            </tr>
                            </form>
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
                                    <h5>Rp {{ number_format($subtotal) }}</h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="btn btn-secondary" href="/books">Continue Shopping</a>
										<a class="btn btn-info" href="/checkout">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
	@endsection