<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

    public function showproductdetail() 
    {
        $data = [
            "product" => $this->Product->get()
        ];
        return view('detailproduct', $data);
    }
    
    public function pembayaranproduct() 
    {
        $data = [
            "product" => $this->Product->get()
        ];
        return view('pembayaran', $data);
    }

    public function history() 
    {
        $data = [
            "product" => $this->Product->get()
        ];
        return view('history', $data);
    }
}
