<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Invoice;
use Stripe\InvoiceItem;
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
        $data = [
            'product' => $product
        ];
        $invoicePath = public_path('invoices/invoice-'.$product->id.".pdf");
        $pdf = PDF::loadView('invoice', $data)
            ->save($invoicePath);
        $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
        $message = $twilio->messages->create(
            "whatsapp:+2349074919559", [
                "from" => "whatsapp:+14155238886",
                "body" => "Here's your invoice!",
                "mediaUrl" => ["https://f82d4b53.ngrok.io/invoices/invoice-2.pdf"]
            ]
        );
        Log::info($message->sid);
        return view('checkout', $data);
    }

    public function charge(Request $request) {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $amount = 1999;
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
