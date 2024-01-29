@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Data Order</h3>
                        </div>
                        <div class="col-md-6">
                        <a href="{{ URL::to('order/create') }}" class="btn btn-primary btn-sm float-right">Tambah Order</a> <hr>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Invoice</td>
                                <td>Customer ID</td>
                                <td>User ID</td>
                                <td>Total</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key =>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->invoice}}</td>
                                    <td>{{$value->customer->nama_customer}}</td>
                                    <td>{{$value->user->name}}</td>
                                    <td>{{$value->total}}</td>
                                    <td>{{$value->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="{{URL::to('order/'.$value->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{URL::to('order/'.$value->id)}}" class="btn btn-info btn-sm">Detail</a>
                                        
                                        <form class="delete-form" action="{{ URL::to('order/'.$value->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" name="button"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
