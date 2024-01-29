@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Customer</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/customer/{{$customer->id}}" method="post">
                            @method('PUT')
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="text" name="email" value=" {{$customer->email}}" class="form-control" placeholder="Masukkan Email">
                            </div>

                            <div class="mb-3">
                                <label for="nama_customer" class="form-label"><strong>Nama Customer</strong></label>
                                <input type="text" name="nama_customer" value=" {{$customer->nama_customer}}" class="form-control" placeholder="Masukkan Nama Customer">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{$customer->address}}" class="form-control" placeholder="Masukkan Address">
                            </div>
                          
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{$customer->phone}}" class="form-control" placeholder="Number Phone">
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
