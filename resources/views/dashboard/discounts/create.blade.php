@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Promo</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/discounts" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="book" class="form-label">Nama Buku</label>
            <select class="form-select" name="books_id">
                @foreach ($books as $book)
                    @if (old('books_id') == $book->id)
                        <option value="{{ $book->id }}" selected>{{ $book->tittle }}</option>
                    @else
                        <option value="{{ $book->id }}">{{ $book->tittle }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_promo" class="form-label">Kode Promo</label>
            <input type="text" class="form-control @error('kode_promo') is-invalid @enderror" id="kode_promo" name="kode_promo"
                required autofocus value="{{ old('kode_promo') }}">
            @error('kode_promo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="promo" class="form-label">Promo</label>
            <input type="text" class="form-control @error('promo') is-invalid @enderror" id="promo" name="promo"
                required autofocus value="{{ old('promo') }}">
            @error('promo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="expire" class="form-label">Masa Berlaku</label>
            <input type="date" class="form-control @error('expire') is-invalid @enderror" id="expire" name="expire"
                required autofocus value="{{ old('expire') }}">
            @error('expire')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Sampai pada</label>
            <input type="text" class="form-control @error('count') is-invalid @enderror" id="count" name="count"
                required autofocus value="{{ old('count') }}">
            @error('count')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        {{-- <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div> --}}



        <button type="submit" class="btn btn-primary">Create Promo</button>
    </form>
</div>

@endsection