@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Produk</h3>
                        <div class="col-md-6">
                        <a href="{{ URL::to('produk') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Nama Produk</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{ $produk->nama_produk }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Deskripsi</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{ $produk->keterangan }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Harga</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{ $produk->price }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Kategori</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{ $produk->category_id }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Stok</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{ $produk->stock }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection