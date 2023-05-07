@extends('layouts.about_main')
@section('container')
    
    <!-- jumbotron -->
<section class="jumbotron text-center">
    <img src="img/alfi.jpg" alt="hehe" class="rounded-circle">
    <h1 class="display-4">Alfi Akbar Ridzki</h1>
    <p class="lead">Fresh Graduate</p>
    <img src="img/skills/html.png" class="rounded-square" alt="html.png">
    <img src="img/skills/css.png" class="rounded-square" alt="css.png">
    <img src="img/skills/javascript.png" class="rounded-square" alt="javascript.png">
    <img src="img/skills/java.jpg" class="rounded-square" alt="java.jpg">
    <img src="img/skills/PHP.png" class="rounded-square" alt="php.png">
    <img src="img/skills/laravel.png" class="rounded-square" alt="laravel.png">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
        d="M0,160L48,138.7C96,117,192,75,288,96C384,117,480,203,576,229.3C672,256,768,224,864,197.3C960,171,1056,149,1152,138.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</section>
<!-- akhir jumbotron -->

 <!-- about -->
 <section id="about">
    <div class="container">
        <div class="row text-center">
            <div class="col mb-3">
                <h2>About Me</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p>Halo, Saya Alfi Akbar Ridzki, Saya merupakan fresh graduate jurusan Teknik Informatika Universitas Indraprasta PGRI.</p>
                <p>Saya memiliki semangat bekerja yang tinggi dan bertanggung jawab terhadap pekerjaan. Memiliki kemampuan berkomunikasi yang baik, terbiasa bekerja menggunakan komputer, mudah beradaptasi, dan bisa bekerja secara individu atau tim. 
                    </p>
            </div>
            <div class="col-md-5">
                <p>Umur : 23</p>
                <p>Telepon : (+62) 895-1456-4706</p>
                <p>Email : akbaralfi66@gmail.com</p>
                <p>Alamat : Jl. Laksamana Raya, Bambu Apus, Cipayung, Jakarta Timur</p>
                <p></p>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#8bc4df" fill-opacity="1"
            d="M0,0L48,26.7C96,53,192,107,288,112C384,117,480,75,576,74.7C672,75,768,117,864,149.3C960,181,1056,203,1152,181.3C1248,160,1344,96,1392,64L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</section>
<!-- akhir about -->

<!-- projects -->
<section id="projects">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2>My Projects</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="img/projects/1.jpg" class="card-img-top" alt="1.jpg">
                    <div class="card-body">
                        <p class="card-text">Aplikasi Manajemen Inventory berbasis Dekstop.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/projects/2.jpg" class="card-img-top" alt="2.jpg">
                    <div class="card-body">
                        <p class="card-text">Aplikasi Manajemen Aset Berbasis Dekstop.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/projects/3.jpg" class="card-img-top" alt="3.jpg">
                    <div class="card-body">
                        <p class="card-text">Penjualan Buku berbasis web.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0d6efd" fill-opacity="1"
            d="M0,256L48,245.3C96,235,192,213,288,186.7C384,160,480,128,576,144C672,160,768,224,864,245.3C960,267,1056,245,1152,218.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</section>
<!-- akhir projects -->

<!-- footer -->
<footer class="bg-primary text-white text-center pb-5">Created by <a href="https://www.instagram.com/akbar_alfi/"
    class="text-white fw-bold">Alfi Akbar Ridzki</a>
</footer>
<!-- akhir footer -->


@endsection