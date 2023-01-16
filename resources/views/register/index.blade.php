@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="name">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username">
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email">
                        <label for="email" class="form-label">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary mt-3">Submit</button>
                    <small class="d-block text-center mt-3">Sudah punya akun ? <a href="/login">Login</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
