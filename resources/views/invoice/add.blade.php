@extends('layouts.app')
@section('content')
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-10"> 
            <div class="card" > 
                <div class="card-header"> 
                    <h3 class="card-title">Invoice</h3>
                </div>
                <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
                @endif
                <form class="row g-3" method="POST" action="{{ route('invoice.store') }}">
                    @csrf
                    <div class="col-12">
                        <label for="invoice" class="form-label">Invoice</label>
                        <input type="text" class="form-control" id="invoice" name="invoice" placeholder="Masukkan Invoice" value="{{$invoice}}">
                      </div>
                        <div class="col-12">
                          <label for="name" class="form-label">Nama Customer</label>
                          <select name="customer" id="customer" class="form-select">
                            <option disabled selected>-- Pilih Customer --</option>
                            @foreach ($customer as $key => $value)
                            <option value="{{$value->id}}">{{$value->nama_customer}}</option>
                            @endforeach
                        </select>
                        </div>
                      <div class="col-md-12">
                        <label for="user" class="form-label">User</label>
                        <select name="user" id="user" class="form-select">
                            <option disabled selected>-- Pilih User --</option>
                            @foreach ($user as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
     </div>
 </div>
@endsection 