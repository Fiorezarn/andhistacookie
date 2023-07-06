<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->Product = new Product();
    }

    public function index()
    {
        $data = [
            'product' => $this->Product->get()
        ];
        return view('dashboard.v_dashboard', $data);
    }

    public function detail($id)
    {
        if (!$this->Product->detailData($id)) {
            abort(404);
        }
        $data = [
            'product'=> $this->Product->detailData($id),
        ];
        return view('dashboard.v_detailproduk', $data);
    }

    public function add()
    {
        return view ('dashboard.v_addproduk');
    }

    public function insert()
    {
        Request()->validate([
            'id' => 'nullable|unique:products,id|min:1|max:6',
            'no' => 'required|integer',
            'namakue' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
            'photo' => 'required|mimes:jpg,jpeg,png,webp|max:1000',
            'deskripsi' => 'required',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namakue.'.'.$file->extension();
        $file->move(public_path('fotokue'), $fileName);

        $data = [
            'id' => Request()->id,
            'no' => Request()->no,
            'namakue' => Request()->namakue,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'photo' => $fileName,
            'deskripsi' => Request()->deskripsi,
        ];

        $this->Product->addData($data);
        return redirect()->route('admin')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->Product->detailData($id)) {
            abort(404);
        }
        $data = [
            'produk'=> $this->Product->detailData($id),
        ];
        return view ('dashboard.v_editproduk', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'id' => 'nullable|min:1|max:6',
            'no' => 'required|integer',
            'namakue' => 'required',
            'stock' => 'required',
            'harga' => 'required|integer',
            'photo' => 'mimes:jpg,jpeg,png,webp|max:1000',
            'deskripsi' => 'required',
        ],[
            'id.required' => 'wajib diisi !!',
            'id.unique' => 'id Sudah Ada !!',
            'id.min' => 'Min 1 Karakter',
            'id.max' => 'Max 6 Karakter'
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->gambar <> "") {
        //jika ingin ganti foto
        //upload photo
        $file = Request()-> photo;
        $fileName = Request()->namakue.'.'.$file->extension();
        $file->move(public_path('fotokue'), $fileName);

        $data = [
            'id' => Request()->id,
            'no' => Request()->no,
            'namakue' => Request()->namakue,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'photo' => $fileName,
            'deskripsi' => Request()->deskripsi,
        ];

        $this->Product->editData($id, $data);
        }else {
            //jika tidak ingin ganti foto
            $data = [
            'id' => Request()->id,
            'no' => Request()->no,
            'namakue' => Request()->namakue,
            'stock' => Request()->stock,
            'harga' => Request()->harga,
            'deskripsi' => Request()->deskripsi,
            ];
            $this->Product->editData($id, $data);
        }
        return redirect()->route('admin')->with('pesan','Data Berhasil Di Update !!');
    }
}
