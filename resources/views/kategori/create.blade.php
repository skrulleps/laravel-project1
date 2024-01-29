@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kategori</h3>
                        <div class="col-md-6">
                        <a href="{{ URL::to('kategori') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{URL::to('kategori')}}" method="post">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan Kategori">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
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
