@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Book</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/books" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" id="kode_buku" name="kode_buku"
                required autofocus value="{{ old('kode_buku') }}">
            @error('kode_buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tittle" class="form-label">Tittle</label>
            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle"
                required autofocus value="{{ old('tittle') }}">
            @error('tittle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang"
                required autofocus value="{{ old('pengarang') }}">
            @error('pengarang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="terbit" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control @error('terbit') is-invalid @enderror" id="terbit" name="terbit"
                required autofocus value="{{ old('terbit') }}">
            @error('terbit')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                required autofocus value="{{ old('stok') }}">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                required autofocus value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Book Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>



        <button type="submit" class="btn btn-primary">Create Book</button>
    </form>
</div>

@endsection