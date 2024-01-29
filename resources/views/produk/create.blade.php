@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3><hr>
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

                        <form action="{{ url::to('/produk') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" id="nama_produk">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan">Deskripsi</label>
                                <textarea name="keterangan" cols="10" rows="10" class="form-control" placeholder="Masukkan keterangan dari produk"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="stockk">Stok</label>
                                <input type="number" name="stock" class="form-control" placeholder="Masukkan stok produk">
                            </div>

                            <div class="mb-3">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control" placeholder="Masukkan harga produk">
                            </div>

                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama_kategori}}</option>
                                    @endforeach
                                </select>
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
