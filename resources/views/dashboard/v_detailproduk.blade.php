@extends('dashboard.v_template')
@section('title', 'Detail Moisturizer')

@section('content')

<table class="table">
    <tr>
        <th width="100px">Id</th>
        <th width="30px">:</th>
        <th>{{ $product->id }}</th>
    </tr>
    <tr>
        <th width="100px">No</th>
        <th width="30px">:</th>
        <th>{{ $product->no }}</th>
    </tr>
    <tr>
        <th width="100px">Nama Kue</th>
        <th width="30px">:</th>
        <th>{{ $product->namakue }}</th>
    </tr>
    <tr>
        <th width="100px">Deskripsi</th>
        <th width="30px">:</th>
        <th>{{ $product->deskripsi }}</th>
    </tr>
    <tr>
        <th width="100px">Harga</th>
        <th width="30px">:</th>
        <th>{{ $product->harga }}</th>
    </tr>
    <tr>
        <th width="100px">Stock</th>
        <th width="30px">:</th>
        <th>{{ $product->stock }}</th>
    </tr>
    <tr>
        <th width="100px">Gambar</th>
        <th width="30px">:</th>
        <th><img src="{{url('product-img/',$product->photo)}}" width="100px"></th>
    </tr>
    <tr>
        <th><a href="/admin" class="btn btn-success btn-sm">Back</a></th>
    </tr>
</table>




@endsection
