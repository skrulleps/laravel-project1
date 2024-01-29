@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Order Detail</h3>
                        <div class="col-md-6">
                        <a href="{{URL::to('orderDetail')}}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Order ID</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$orderDetail->order_id}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Product ID</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$orderDetail->product_id}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Quantity</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$orderDetail->qty}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Price</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$orderDetail->price}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
