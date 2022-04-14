<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        //kita ambil data nya kecuali transaction detail, fungsi except itu kecuali
        $data = $request->except('transaction_detail');
        //ini kita buat kode transaksi random
        $data['uuid'] = 'TRX' . mt_rand(1000,9999) . mt_rand(100,999);

        //kita simpan ke table transaksi dari $data
        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) 
        {
            
            //kita tampung dulu transaksi detail nya didalam array
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'products_id' => $product,
            ]);

            //ini untuk mengurangi product yang di beli dengan decrement
            Product::find($product)->decrement('quantity');
        }

        //untuk menyimpan transaksi detail, details dapat dari model
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
