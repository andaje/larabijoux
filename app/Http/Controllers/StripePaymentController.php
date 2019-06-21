<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Cart;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $pay = Cart::subTotal();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" =>100* $pay ,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Test payment from Anda."
        ]);

        Session::flash('success', 'Payment successful!');

        Cart::destroy();

        return back();
    }


}
