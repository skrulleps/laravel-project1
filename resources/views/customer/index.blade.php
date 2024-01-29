@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Data Customer</h3>
                        </div>
                        <div class="col-md-6">
                        <a href="{{ URL::to('customer') }}" class="btn btn-primary btn-sm float-right"> Lihat All</a> | <a href="{{ URL::to('customer/create') }}" class="btn btn-primary btn-sm float-right">Tambah Order</a> <hr>
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
                                <td>Email </td>
                                <td>Nama Customer</td>
                                <td>Address</td>
                                <td>Phone</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $key =>$value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->nama_customer}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="{{URL::to('customer/'.$value->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{URL::to('customer/'.$value->id)}}" class="btn btn-info btn-sm">Detail</a>
                                        <form class="delete-form" action="{{ URL::to('customer/'.$value->id) }}" method="post">
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
