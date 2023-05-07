<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Duck Book | {{ $tittle }}</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="sweetalert2.min.css">

    <style>
    .jumbotron {
        padding-top: 6rem;
        background-color: #8bc4df;
    }

    #projects {
        background-color: #8bc4df;
    }

    #contact {
        
        background-color: #8bc4df;
    }

    section {
        padding-top: 5rem;
    }
    </style>

  </head>
  <body>
    
    @include('partials.navbar')
    @yield('container')
    {{-- <div class="container mt-4">
      @yield('container')
    </div> --}}
    
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    

  
  </body>
</html>