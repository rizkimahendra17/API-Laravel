<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
       
    //dicek id nya        
        if($id)
        {
            //galleries itu tabel join yang di model
            $product = Product::with('galleries')->find($id);

            //jika product ada keluar pemberitauan
            if($product)
                return ResponseFormatter::success($product, 'Data Produk Berhasil Di Ambil');
            else
            return ResponseFormatter::error(null, 'Data Produk Tidak Ada', 404);

        }

        //ini ambil data berdasarkan slug
        if($slug)
        {
            $product = Product::with('galleries')->where('slug',$slug)->first();

            //jika product ada keluar pemberitauan
            if($product)
                return ResponseFormatter::success($product, 'Data Produk Berhasil Di Ambil');
            else
            return ResponseFormatter::error(null, 'Data Produk Tidak Ada', 404);

        }

        $product = Product::with('galleries');

        if($name)
            $product->where('name', 'like', '%' . $name . '%');
        
        if($type)
        $product->where('type', 'like', '%' . $type . '%');
        
        if($price_from)
        $product->where('price', '>=', $price_from);

        if($price_to)
        $product->where('price', '<=', $price_to);


        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Produk Berhasil Di Ambil'
        );

    }
}
