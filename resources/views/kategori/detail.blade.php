@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Kategori</h3>
                        <div class="col-md-6">
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Nama Kategori</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$kategori->nama_kategori}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Keterangan</strong></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value=": {{$kategori->keterangan}}">
                            </div>
                        </div><hr>
                        
                        <div class="col-md-6">
                        <a href="{{URL::to('kategori')}}" class="btn btn-primary btn-sm float-right"> Kembali</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
