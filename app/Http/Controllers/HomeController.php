<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    /*public function products(){
        return view('products',array('title' => 'Products listing', 'description'=>'lorem ipsum', 'page'=>'products',
             'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function product_details($id){
        $product = Product::find($id);
        return view('product_details',array('product' => $product,'title'=>$product->name,
            'description'=>$product->description, 'page'=>'products',
             'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function product_categories($name){
        return view('products',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'products',
             'categories' => $this->categories, 'products'=>$this->products ));
    }*/

}
