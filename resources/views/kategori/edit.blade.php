@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kategori</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/kategori/{{$kategori->id}}" method="post">
                            @method('PUT')
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control" placeholder="Masukkan Kategori">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" value="{{$kategori->keterangan}}" class="form-control" placeholder="Masukkan Keterangan">
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
