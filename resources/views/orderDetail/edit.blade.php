@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Order Detail</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/orderDetail/{{$orderDetail->id}}" method="post">
                            @method('PUT')
                            @csrf
                            
                            <div class="mb-3">
                                <label for="order">Oder ID</label>
                                <select name="order" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($order as $key => $value)
                                        <option value="{{$value->id}}" @if($orderDetail->order_id == $value->id) selected @endif>{{ $value->invoice }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="produk">Product ID</label>
                                <select name="produk" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($produk as $key => $value)
                                        <option value="{{$value->id}}" @if($orderDetail->product_id == $value->id) selected @endif>{{ $value->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="text" name="qty" value="{{$orderDetail->qty}}" class="form-control" placeholder="Masukkan Quantity">
                            </div>

                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input type="number" name="price" value="{{$orderDetail->price}}" class="form-control" placeholder="Masukkan Price">
                            </div>


                            <div class="mb-3">
                                <button class="btn btn-danger btn-sm">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
