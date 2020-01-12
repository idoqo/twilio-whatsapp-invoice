<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

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

    public function charge(Request $request) {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->get('stripeEmail'),
                'source' => $request->get('stripeToken')
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1999,
                'currency' => 'usd'
            ));

            return 'Thanks for your purchase!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
