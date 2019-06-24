<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;



class FrontController extends Controller
{

    var $categories;
    var $products;
    var $title;
    var $description;


    public function __construct()
    {
        //$this->middleware('auth');
        $this->categories = Category::all(array('name'));
        $this->products = Product::all();
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->paginate(4);
        return view('home2', compact('categories', 'products'));
    }


    public function categories()
    {
        return view('categories', array(
            'categories' => $this->categories));
    }

    public function show_products()
    {
        $cat = Category:: all();
        $products = Product::all();
        $category = Category:: pluck('name');
        //dd($products);
        return view('show_products', compact('category', 'products', 'cat'));
    }

    public function cat_prod($id)
    {
        $cat = Category:: all();
        //$products = Product::all();
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();
        //dd($cat_prod);

        return view('show_products', compact('category', 'cat', 'products'));

    }
    public function product_details($id)
    {
        $cat = Category:: all();
        $category = Category ::find($id);
        //dd($category);
        $prod = Product:: all();
        $products = Product::where('id', $id)->get();
        $produ = Product::where('id', $id)->first();
        //dd($products);
       if($produ->quantity >= 10){
           $stockLevel = '<p class="badge badge-success">In stock</p>';
       }elseif ($produ->quantity > 0 && $produ->quantity < 10 ){
           $stockLevel = '<p class="badge badge-warning">Low stock</p>';
       } else{
           $stockLevel = '<p class="badge badge-danger" >Not Available </p>';
       }
        //dd($products );

        return view('product_details', compact('produ','products', 'cat','category', 'prod','stockLevel'));
    }
    public function cart(){
        if(Request::isMethod('post')){
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }
        $cart = Cart::content();
        //increment
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $item = Cart::search(
                function($key, $value) {
                    return $key->id == Request::get('product_id');
                })->first();
            Cart::update($item->rowId, $item->qty + 1);
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); })->first();
            Cart::update($item->rowId, $item->qty - 1);
        }
        //delete item
        if (Request::get('product_id') && (Request::get('delete')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); })->first();
            Cart::remove($item->rowId);
        }
        $this->decreaseQuantities();

        return view('cart',compact('token','cart')
        );
    }
    public function clear_cart(){
        Cart::destroy();
        return Redirect::away('cart');
    }


    public function checkout(){

        if(Request::isMethod('post')){
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }
        $cart = Cart::content();
        //increment
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $item = Cart::search(
                function($key, $value) {
                    return $key->id == Request::get('product_id');
                })->first();
            Cart::update($item->rowId, $item->qty + 1);
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); })->first();
            Cart::update($item->rowId, $item->qty - 1);

        }
        return view('checkout', compact ('cart', 'token','cities', 'cit','countries', 'addresses'));
    }

    public function decreaseQuantities()
    {
        $message = array();
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);

            if ($product->quantity - $item->qty < 0) {
                $message[] = 'Not enough Product' . $item->id;
            }else
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }


    public function contact(){

        return view('contact');
    }















}













