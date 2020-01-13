<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Twilio\Rest\Client;

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
        $user = User::find(1); // replace this with the authenticated user
        $data = [
            'product' => $product,
            'user' => $user
        ];
        $invoiceFile = "invoice-".$product->id.".pdf";
        $invoicePath = public_path("invoices/".$invoiceFile);
        PDF::loadView('invoice', $data)
            ->save($invoicePath);
        $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
        $twilio->messages->create(
            "whatsapp:".$user->phone_number, [
                "from" => "whatsapp:".env('TWILIO_SANDBOX_NUMBER'),
                "body" => "Here's your invoice!",
                "mediaUrl" => ["https://09530f6d.ngrok.io/invoices/".$invoiceFile]
            ]
        );
        return view('checkout', $data);
    }

    public function charge(Request $request) {
        $product = Product::find($request->get('product_id'));
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $amount = $product->price * 100;
            $customer = Customer::create(array(
                'email' => $request->get('stripeEmail'),
                'source' => $request->get('stripeToken')
            ));


            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'usd'
            ));
            dd($charge->receipt_url);

            return 'Thanks for your purchase!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
