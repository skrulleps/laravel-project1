@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Order Detail</h3>
                        <div class="col-md-6">
                        <a href="{{ URL::to('orderDetail') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{URL::to('orderDetail')}}" method="post">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="order">Order ID</label>
                                <select name="order" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($order as $key => $value)
                                        <option value="{{$value->id}}">{{$value->invoice}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="produk">Product ID</label>
                                <select name="produk" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($produk as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="text" name="qty" class="form-control" placeholder="Masukkan Quantity">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <textarea name="price" class="form-control" placeholder="Masukkan Price"></textarea>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
