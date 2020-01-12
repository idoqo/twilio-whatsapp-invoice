<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $products = \App\Product::all();
        $data = [
            'products' => $products
        ];
        return view('welcome', $data);
    }

    public function checkout ($id) {
        $product = \App\Product::findOrFail($id);
        $data = [
            'product' => $product
        ];
        return view('checkout', $data);
    }
}
