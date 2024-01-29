@extends('layouts.app')
@section('content')
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-10"> 
            <div class="card" > 
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <tr>
                                    <td>Invoice</td>
                                    <td>:</td>
                                    <td>{{ $orders->invoice }}</td>
                                </tr>
                                <tr>
                                    <td width="30%">Customer</td>
                                    <td>:</td>
                                    <td>{{ $orders->customer->nama_customer }}</td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td>:</td>
                                    <td>{{ $orders->user->name }}</td>
                                </tr>
                            </table>
                            <form action="{{ route('invoice.update', ['id' => $orders->id]) }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                                                
                                <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                <div class="col-md-4">
                                    <input type="hidden" name="_method" value="PUT" class="form-control">
                                    <select name="product_id" class="form-control">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" min="1" value="1" name="qty" class="form-control" required>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-sm">ADD</button>
                                </div>
                                <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                            </div>
                            </form>
                        </div>
                        <div class="col-md-12 mt-3">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Product</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($orderDetails as $detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $detail->nama_produk }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp {{ number_format($detail->price) }}</td>
                                        <td>
                                            <form action="{{ route('invoice.delete', ['id' => $detail->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->

                            </table>
                        </div>
                        
                        <!-- MENAMPILKAN TOTAL & TAX -->
                        <div class="col-md-4 offset-md-8">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>:</td>
                                    <td>Rp {{ number_format($orders->total) }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- MENAMPILKAN TOTAL & TAX -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
