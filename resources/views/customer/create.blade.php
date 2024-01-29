@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Customer</h3><hr>
                        <div class="col-md-6">
                        <a href="{{ URL::to('customer') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url::to('/customer') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Masukkan Email" id="email">
                            </div>

                            <div class="mb-3">
                                <label for="nama_customer" class="form-label">Nama Customer</label>
                                <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan nama Customer" id="nama_customer">
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" cols="10" rows="10" class="form-control" placeholder="Masukkan Alamat"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Masukkan Phone">
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
