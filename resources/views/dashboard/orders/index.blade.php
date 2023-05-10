@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Orders</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        {{-- <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new Category</a> --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->invoice }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->user_phone }}</td>
                        <td>{{ $order->user_address }}</td>
                        <td>{{ $order->subtotal }}</td>
                        <td>
                            <a href="/dashboard/orders/{{ $order->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/orders/{{ $order->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/orders/{{ $order->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
