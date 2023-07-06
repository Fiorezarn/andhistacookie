@extends('dashboard.v_template')
@section('title', 'Add Produk')

@section('content')
<form action="/admin/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <!-- <div class="form-group">
                    <label>ID Produk</label>
                    <input name="id_produk" class="form-control" value="{{old('id')}}">
                        <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                        </div>
                </div> -->

                <div class="form-group">
                    <label>Id</label>
                    <input name="id" class="form-control" value="{{old('id')}}">
                    <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>No</label>
                    <input name="no" class="form-control" value="{{old('no')}}">
                    <div class="text-danger">
                            @error('no')
                                {{ $message }}
                            @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="namakue" class="form-control" value="{{old('namakue')}}">
                    <div class="text-danger">
                            @error('namakue')
                                {{ $message }}
                            @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input name="harga" class="form-control" value="{{old('harga')}}">
                        <div class="text-danger">
                                @error('harga')
                                    {{ $message }}
                                @enderror
                        </div>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input name="stock" class="form-control" value="{{old('stock')}}">
                        <div class="text-danger">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                        </div>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" class="form-control" value="{{old('deskripsi')}}">
                        <div class="text-danger">
                                @error('deskripsi')
                                    {{ $message }}
                                @enderror
                        </div>
                </div>

                <div class="form-group">
                    <label>Foto Produk</label>
                    <input type="file" name="photo" class="form-control" >
                        <div class="text-danger">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                        </div>
                </div>

                <div class="form-group">
                   <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>
    
    

</form>

@endsection