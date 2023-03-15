@extends('layouts.main')

@section('container')
    <h1 class="mb-3">Buku Rekomendasi</h1>

    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-3">
                    {{-- <div class="position-absolute px-3 py-3"> --}}
                    <div class="card" style="width: 12em; ">
                        <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->tittle }}"
                                                class="img-fluid ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/books/{{ $book['slug'] }}">{{ $book['tittle'] }}</a></h5>
                            <p class="card-text">{{ $book['pengarang'] }}</p>
                            <br>
                            <small class="card-text">Rp {{ $book['harga'] }}</small>

                        </div>
                    </div>
                {{-- </div> --}}
                        
<!-- CODE SEBELUMNYA -->

<p></p>

<!-- TAMBAHKAN FORM ACTION -->
<form action="{{ route('front.cart') }}" method="POST">
  @csrf
  <div class="product_count">
    <label for="qty">Quantity:</label>
    <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
    
    <!-- BUAT INPUTAN HIDDEN YANG BERISI ID PRODUK -->
    <input type="hidden" name="id" value="{{ $book['id'] }}" class="form-control">
    

      <i class="lnr lnr-chevron-down"></i>
    </button>
  </div>
  <div class="card_area">
    
    <!-- UBAH JADI BUTTON -->
    <button class="main_btn">Add to Cart</button>
    <!-- UBAH JADI BUTTON -->
    
  </div>
</form>

<!-- CODE SETELAHNYA -->


            </div>
            @endforeach
    </div>
    </div>
    </div>
@endsection
