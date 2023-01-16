@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <h1>belum ada ide ini halaman mau digimanain</h1>
        <h1>{{ $book->tittle }}</h1>

        <div style="max-height: 350px;">
            <img src="{{ asset('storage/' . $book->image) }}"
                alt="{{ $book->tittle }}" class="img-fluid mt-3">
        </div>
    
    </div>
</div>
@endsection