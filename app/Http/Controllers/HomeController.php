<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function showproduct() 
    {
        $data = [
            "product" => $this->Product->get()
        ];
        return view('home', $data);
    }

    public function showproductdetail($id) 
    {
        $data = [
            "product" => $this->Product->detailData($id)
        ];
        return view('detailproduct', $data);
    }
    
    public function pembayaranproduct($id) 
    {
        $data = [
            "product" => $this->Product->detailData($id)
        ];
        return view('pembayaran', $data);
    }

    public function insertpembayaran()
    {
        Request()->validate([
            'id' => 'nullable|unique:products,id|min:1|max:6',
            'namapenerima' => 'required',
            'namakue' => 'required',
            'totalitem' => 'required|integer',
            'totalharga' => 'required|integer',
            'alamat' => 'required',
            'buktipembayaran' => 'required|mimes:jpg,jpeg,png,webp|max:1000',
        ],[
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
            'namapenerima' => Request()->namapenerima,
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
        $data = [
            "product" => $this->Product->get()
        ];
        return view('history', $data);
    }
}
