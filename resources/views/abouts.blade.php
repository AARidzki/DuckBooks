@extends('layouts.main')
@section('container')

    <h1>Halaman About</h1>
    <br>

    @foreach ($abouts as $about)
    <article class="mb-5">
        <h3>
            <a href="/abouts/{{ $about["id"] }}">{{ $about["nama"] }}</a>
        </h3>
        <p>{{ $about["email"] }}</p>
        <img src="{{ $about["img"] }}" alt="">
    </article>
    @endforeach

    {{-- <h1>Halaman About</h1>
    <br>
    
    <div class="container">
        <div class="row">

            <div class="col-md-4 mb-3">
                <h3>
                   <a href="/abouts/{{ $abouts["id"] }}">{{ $nama }}</a>
                </h3>
                <p>{{ $email }}</p>
                <img src="img/alfi.jpg" alt="alfi.jpg" width="200" class="img-fluid">
            </div>
            <div class="col-md-4 mb-3">
                <h3>{{ $nama1 }}</h3>
                <p>{{ $email1 }}</p>
                <div style="max-height: 200px; overflow: hidden;">
                    <img src="img/galang1.JPG" alt="galang1.jpg" width="200" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h3>{{ $nama2 }}</h3>
                <p>{{ $email2 }}</p>
                <img src="img/nurul1.JPG" alt="uyun.jpg" width="200" class="img-fluid">
            </div>

        </div>
    </div> --}}





@endsection
    



