@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Data Produk</h3>
                        </div>
                        <div class="col-md-6">
                        <a href="{{ URL::to('produk') }}" class="btn btn-primary btn-sm float-right"> Lihat All</a> | <a href="{{ URL::to('produk/create') }}" class="btn btn-primary btn-sm float-right">Tambah Produk</a> <hr>
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
                                <td>Nama Produk</td>
                                <td>Keterangan</td>
                                <td>Stock</td>
                                <td>Price</td>
                                <td>Category_id</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $key =>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->nama_produk}}</td>
                                    <td>{{$value->keterangan}}</td>
                                    <td>{{$value->stock}}</td>
                                    <td>Rp {{$value->price}}</td>
                                    <td>{{$value->category_id}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{URL::to('produk/'.$value->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{URL::to('produk/'.$value->id)}}" class="btn btn-info btn-sm">Detail</a>
                                        <form class="delete-form" action="{{ URL::to('produk/'.$value->id) }}" method="post">
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
