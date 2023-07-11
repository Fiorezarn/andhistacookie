@extends('layouts.main')
@section('css', '/css/history.css')

@section('content')
<section class="history">
    
<div class="relative overflow-x-auto tabel-history">
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Penerima
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kue
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Item
                </th>
                <th scope="col" class="px-6 py-3">
                   Total Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Status Pembayaran
                 </th>
            </tr>
        </thead>
        
  @if(auth()->check())
        <tbody>
        @auth
        @if($order-> count() > 0)
            @foreach ($order as $history)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $history->namapenerima }}
                </th>
                <td class="px-6 py-4">
                    {{ $history->namakue }}
                </td>
                <td class="px-6 py-4">
                    {{ $history->totalitem }}
                </td>
                <td class="px-6 py-4">
                    {{ $history->totalharga }}
                </td>
                <td class="px-6 py-4">
                    {{ $history->alamat }}
                </td>
                <td class="px-6 py-4">
                    {{ $history->status_pembayaran }}
                </td>
            </tr>
            @endforeach
            @else
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Tidak ada history transaksi. Silahkan Kunjungi Product kami. 
                </th>
            </tr>
            @endif
        </tbody>
        @endauth
    @endif
    </table>
</div>

</section>

@endsection
