<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function allData()
    {
        return DB::table('products')->get();
    }
    public function detailData($id)
    {
        return DB::table('products')->where('id', $id)->first();
    }
    public function addData($data)
    {
        return DB::table('products')->insert($data);
    }
    public function editData($id, $data)
    {
        return DB::table('products')->where('id', $id)->update($data);
    }
    public function deleteData($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->delete();
    }
}
