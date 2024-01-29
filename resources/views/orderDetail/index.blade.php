@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Data Order Detail</h3>
                        </div>
                        <div class="col-md-6">
                        <a href="{{ URL::to('orderDetail') }}" class="btn btn-primary btn-sm float-right"> Lihat All</a> | <a href="{{ URL::to('orderDetail/create') }}" class="btn btn-primary btn-sm float-right">Tambah Produk</a> <hr>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Order ID</td>
                                <td>Product ID</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetail as $key =>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->order_id}}</td>
                                    <td>{{$value->product_id}}</td>
                                    <td>{{$value->qty}}</td>
                                    <td>Rp {{$value->price}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{URL::to('orderDetail/'.$value->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{URL::to('orderDetail/'.$value->id)}}" class="btn btn-info btn-sm">Detail</a>
                                        <form class="delete-form" action="{{ URL::to('orderDetail/'.$value->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" name="button"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
