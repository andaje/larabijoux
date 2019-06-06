<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;


class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $products = Product::with('categories')->get();
        $products = Product::orderBy('id','desc')->get();
        //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //
        }
        $product = new Product();
        $product ->photo_id = $photo->id;
       // dd($photo->id);
        $product ->name = $request->input('name');
        $product ->title = $request->input('title');
        $product ->description = $request->input('description');
        $product ->price = $request->input('price');
        $product ->save();
        $product->category()->sync($request->input('categories',[]));
        return redirect('/admin/products');
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
        $product = Product::findOrFail($id);//ophalen uit db
        $categories = Category::all();
        /*$this->data['products'] = $product;
        $this->data['categories'] = Category::all();
        $selectedCategories = $product->category()->get()->toArray();
        $selectedCategories = Arr::pluck($selectedCategories, 'id');
        $this->data['selectedCategories'] = $selectedCategories;
        dd($selectedCategories);*/
        return view('admin.products.edit',compact('product','categories'));

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
        $product=Product::findOrFail($id);
        //$category = Category::pluck('name','id');
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //
        }
        $product->update($input);
        $product->category()->sync($request->input('categories',[]));
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products');
    }
}
