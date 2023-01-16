@extends('layouts.main')

@section('container')
    
    

    
        <h2>
            {{ $book['tittle'] }}
        </h2>
        <h5>{{ $book['penulis'] }}</h5>
    

    <a href="/books">Back To Books</a>

@endsection
