<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{

    public function index()
    {
        //$orders = Order::all();
        //$orders = auth()->user()->orders; // n + 1 issues
        $orders = auth()->user()->orders()->with('products')->get(); // fix n + 1 issues
        return view('my-orders')->with('orders', $orders);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(Order $order)
    {
        /*if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }*/
        $products = $order->products;
        return view('my-order')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    } //
}
