<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function get(Request $request, $id)
    {
        //kita mengambil transaksi berdasrkan detail dan product, itu detail dan product dari function di model
        $product = Transaction::with('details.product')->find($id);

        if($product)
            return ResponseFormatter::success($product,'Data Transaksi Berhasil diambil');
        else
          return ResponseFormatter::success(null,'Data Transaksi tidak ada', 404);


    }

}
