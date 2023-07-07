<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = ['namapenerima', 'namakue', 'totalitem', 'totalharga', 'alamat', 'buktipembayaran'];

    public function allData()
    {
        return DB::table('orders')->get();
    }

    public function addData($data)
    {
        return DB::table('orders')->insert($data);
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
