@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Order</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/order/{{$order->id}}" method="post">
                            @method('PUT')
                            @csrf
                            
                            <div class="mb-3">
                                <label for="invoice" class="form-label">Invoice</label>
                                <input type="text" name="invoice" value="{{$order->invoice}}" class="form-control" placeholder="Masukkan Quantity">
                            </div>

                            <div class="mb-3">
                                <label for="customer">Customer ID</label>
                                <select name="customer" class="form-select">
                                    <option value="{{$order->customer->id}}">--{{$order->customer->nama_customer}}</option>
                                    @foreach ($customer as $key => $value)
                                        <option value="{{$value->id}}" @if($order->customer_id == $value->id) selected @endif>{{ $value->nama_customer }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="user">User ID</label>
                                <select name="user" class="form-select">
                                    <option value="{{$order->user->id}}">-- {{$order->user->name}} --</option>
                                    @foreach ($user as $key => $value)
                                        <option value="{{$value->id}}" @if($order->user_id == $value->id) selected @endif>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="total">total</label>
                                <input type="number" name="total" value="{{$order->total}}" class="form-control" placeholder="Masukkan Total">
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
