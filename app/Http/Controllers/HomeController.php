<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Product = new Product();
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
            'nohp' => 'required|integer',
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

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> buktipembayaran;
        $fileName = Request()->namapenerima.'.'.$file->extension();
        $file->move(public_path('buktipembayaran'), $fileName);

        $data = [
            'id' => Request()->id,
            'id_user' => $userId,
            'namapenerima' => Request()->namapenerima,
            'nohp' => Request()->nohp,
            'namakue' => Request()->namakue,
            'totalitem' => Request()->totalitem,
            'totalharga' => Request()->totalharga,
            'alamat' => Request()->alamat,
            'buktipembayaran' => $fileName,
        ];

        $this->Order->addDataOrder($data);
        return redirect()->route('pembayaranproduk');
    }

    public function history()
    {
        $userId = auth()->user()->id;

        $data = [
            "product" => $this->Product->get()
        ];
        
        return view('history', $data);
    }
}
