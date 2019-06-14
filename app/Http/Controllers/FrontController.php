<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
        $products = Product::orderBy('id','desc')->paginate(4);
        return view('home2', compact('categories', 'products'));
    }



    public function categories()
    {
        return view('categories', array(
            'categories' => $this->categories));
    }





}
