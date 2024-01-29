@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Order</h3>
                        <div class="col-md-6">
                        <a href="{{URL::to('order')}}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Invoice</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$order->invoice}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Customer ID</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$order->customer_id}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>User ID</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$order->user_id}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Total</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$order->total}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
