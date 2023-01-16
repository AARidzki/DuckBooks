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
                        
            </div>
            @endforeach
    </div>
    </div>
    </div>
@endsection
