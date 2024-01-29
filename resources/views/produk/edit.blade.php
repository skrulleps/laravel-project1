@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Produk</h3>
                        <div class="col-md-6">
                        <a href="{{ URL::to('produk') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/produk/{{$produk->id}}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" value="{{$produk->nama_produk}}" class="form-control" placeholder="Masukkan nama produk">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan">Deskripsi</label>
                                <textarea name="keterangan" cols="10" rows="10" class="form-control" placeholder="Masukkan Keterangan dari produk">{{$produk->keterangan}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="stok">Stok</label>
                                <input type="number" name="stock" value="{{$produk->stock}}" class="form-control" placeholder="Masukkan Stok produk">
                            </div>

                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="price" value="{{$produk->price}}" class="form-control" placeholder="Masukkan Harga produk">
                            </div>

                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                     @foreach ($kategori as $key => $value)
                                        <option value="{{$value->id}}" @if($produk->category_id == $value->id) selected @endif>{{ $value->nama_kategori }}</option>
                                    @endforeach
                                </select>
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
