<?php

namespace App\Http\Controllers;
use App\Product;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name','id')->all();
        return view('admin.stocks.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::firstOrCreate(['name'=> $request->get('product_name') ]);
        Stock::create(['quantity'=>$request->get('quantity'),'product_id'=>$product->id]);

        return redirect('/admin/cities');
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
        $stock= Stock::findOrFail($id);
        $products = Product::pluck('name', 'id');
        return view('admin.stocks.edit', compact('stock', 'products'));
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

        $stock = Stock::findOrFail($id);
        $products = Product::firstOrCreate(['name' => request('product_name')]);
        $stock->update(['quantity'=>$request->get('quantity'),'product_id'=>$products->id]);
        $new_quantity = $request->all()['add_quantity'] ;
        DB::table('stocks')->increment('quantity', $new_quantity);

        return redirect('/admin/stocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
