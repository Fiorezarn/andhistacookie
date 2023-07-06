@extends('layouts.main')
@section('css', '/css/detailproduct.css')

@section('content')
<section class="detail-produk">
    <div class="container">
        <div class="row" >
            <div class="col-md-6 img-produk">
                <img src="{{ asset('img/jumbotron.jpg') }}" alt="...." class=" h-auto rounded-t-lg">       
            </div>
            <div class="col-md-6 text-justify">
                <h2 class="text-2xl font-semibold">Kue Kering</h2>
                <p class="text-lg mt-2 ">Rp 3000000</p>
                <p class="mt-4 pr-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam aliquam expedita rem? Qui autem enim sit, nostrum facere earum sint. Praesentium debitis soluta perspiciatis error possimus nisi, et magnam pariatur!
                </p>
                <div class="mt-6">
                    <p class="mb-2 text-xl">stok : 999</p>
                    <input type="number" name="banyak-item" id="" required class="form-control rounded-xl w-80" placeholder="Banyak Item">
                    <button type="button" class="text-white mt-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                     <a href="/pembayaranproduct">Beli Sekarang</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
