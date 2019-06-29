<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;



class AdminProductsController extends Controller
{

    public function index()
    {
       // $products = Product::with('categories')->get();
        $products = Product::orderBy('id','desc')->paginate(5);
        //dd($products);
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories= Category::pluck('name','id')->all();
        return view('admin.products.create',compact('categories'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //
        }

        $product = new Product();
        $category = $request->all()['category_id'];
        $product ->photo_id = $photo->id;
       // dd($photo->id);
        $product ->name = $request->input('name');
        $product ->title = $request->input('title');
        $product ->description = $request->input('description');
        $product ->price = $request->input('price');
        $product ->quantity = $request->input('quantity');
        $product ->category_id = $category;
        $product ->save();

        return redirect('/admin/products');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);//ophalen uit db
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.products.edit',compact('product','categories'));

    }
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //
        }
        $product->update($input);
        return redirect('/admin/products');
    }

   /* public function update_qty(Request $request, $id){
        $product = Product::findOrFail($id);
        //$products = Product::firstOrCreate(['name' => request('product_name')]);
        $product->update(['quantity'=>$request->get('quantity')]);
        $new_quantity = $request->all()['add_quantity'] ;
        DB::table('products')->increment('quantity', $new_quantity);

        return redirect('/admin/products');
    }*/
   public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('admin/products');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(2);

        return view('search')->with('products', $products);
    }
}
