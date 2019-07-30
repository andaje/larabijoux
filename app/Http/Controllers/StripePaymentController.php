<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Customer;
use Stripe;
use Cart;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request)
    {
        $delivery = Delivery::findOrFail(session('delivery_id'));
        $ship_cost = session('shipment');

        //$pay = Cart::subTotal() ;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $pay= Stripe\Charge::create ([
            "amount" =>(Cart::subTotal() + $ship_cost) * 100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Test payment from Anda."
        ]);
        if($pay->paid == true) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'delivery_id' => $delivery->id,
                'items' => Cart::count(),
                'totalprice' =>(Cart::subTotal() + $ship_cost) ,
            ]);
            foreach (Cart::content() as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price,

                ]);
                $product = Product::findOrFail($cart->id);
                $product->quantity-= $cart->qty;
                $product->save();
            }


            Session::flash('success', 'Payment successful!');

            Cart::destroy();

            return redirect('/');
        }


}

}
