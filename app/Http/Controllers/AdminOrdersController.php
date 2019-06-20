<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\User;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('email','id')->get();
        return view('admin.orders.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Insert into orders table
    public function store(Request $request)
    {
        $user = User::firstOrCreate(['email'=> $request->get('user_email') ]);
        $order = Order::create([
            'user_id ' => auth()->user() ? auth()->user()->id : null,
            'user_id'=>$user->id,
            'user_id'=>$user->first_name,
            'user_id'=>$user->last_name,


        ]);

        //$order->product()->sync($request->input('product',[]));
        // Insert into order_product table

        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
            return redirect('/admin/orders');

        }
    }


    private function getNumbers()
    {
        $newSubtotal = Cart:: subtotal();
        $newTotal = $newSubtotal;

        return collect([
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal

        ]);

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Order::findOrFail($id);
        $users = User::pluck('email', 'id')->get();
        return view('admin.orders.edit', compact('order', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = User::firstOrCreate(['email' => request('user_email')]);
        $order->update(['user_id'=>$user->id]);
        return redirect('/admin/orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);//record uit database halen
        $order->delete();
        return redirect('/admin/orders');

    }
}
