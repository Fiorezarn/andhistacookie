<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    private $product;
    private $order;

    public function __construct(Product $product, Order $order)
    {
        $this->product = $product;
        $this->order = $order;
    }

    public function showproduct()
    {
        $data = [
            "product" => $this->product->get()
        ];
        return view('home', $data);
    }

    public function showproductdetail($id)
    {
        $data = [
            "product" => $this->product->detailData($id)
        ];
        return view('detailproduct', $data);
    }

    public function pembayaranproduct($id)
    {
        $data = [
            "product" => $this->product->detailData($id)
        ];
        return view('pembayaran', $data);
    }

    public function insertpembayaran()
    {
        Request()->validate([
            'namapenerima' => 'required',
            'namakue' => 'required',
            'totalitem' => 'required|integer',
            'totalharga' => 'required|integer',
            'alamat' => 'required',
            'buktipembayaran' => 'required|mimes:jpg,jpeg,png,webp|max:1000',
        ], [
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter',
        ]);

        // Upload foto
        $file = Request()->file('buktipembayaran');
        $fileName = Request()->namapenerima . '.' . $file->extension();
        $file->move(public_path('buktipembayaran'), $fileName);

        $data = [
            'id' => Request()->id,
            'namapenerima' => Request()->namapenerima,
            'namakue' => Request()->namakue,
            'totalitem' => Request()->totalitem,
            'totalharga' => Request()->totalharga,
            'alamat' => Request()->alamat,
            'buktipembayaran' => $fileName,
        ];


        $this->order->addData($data);
        return redirect()->route('showproduk')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function history()
    {
        $data = [
            "product" => $this->product->get()
        ];
        return view('history', $data);
    }
}
