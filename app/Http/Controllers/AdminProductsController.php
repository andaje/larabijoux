<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $products = Product::orderBy('id','desc')->paginate(10);
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
        $categories= Category::pluck('name','id')->all();
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
        //dd($request->all());
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
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
        $categories = Category::pluck('name', 'id')->all();
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
        $category = Category::firstOrCreate(['name' => request('category_name')]);
        $product->update($input);
        $product->update(['name'=>$request->get('name'),'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),'quantity'=>$request->get('quantity'),'add_quantity'=>$request->get('add_quantity'),
            'category_id'=>$category->id]);


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
