@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Order</h3>
                        <div class="col-md-6">
                        <a href="{{ URL::to('order') }}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{URL::to('order')}}" method="post">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="invoice" class="form-label">Invoice</label>
                                <input type="text" name="invoice" class="form-control" placeholder="Masukkan Invoice">
                            </div>

                            <div class="mb-3">
                                <label for="customer">Customer ID</label>
                                <select name="customer" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($customer as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nama_customer}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="userk">User ID</label>
                                <select name="user" class="form-select">
                                    <option value="0">-- Pilih Kategori --</option>
                                    @foreach ($user as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                            <div class="mb-3">
                                <label for="total">Total</label>
                                <input type="text" name="total" class="form-control" placeholder="Masukkan Total">
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
