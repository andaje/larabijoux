<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{

    public function index()
    {
        //$orders = Order::all();
        //$orders = auth()->user()->orders; // n + 1 issues
        $orders = Order::with('user', 'delivery.city.country')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show()
    {
        /*if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }*/
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('admin.orders.edit', compact('order', 'orderItems'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $order = Order::findOrFail($id);
        $order->update($input);
        return redirect('admin/orders');
    }

    public function destroy($id)
    {

    }


}
