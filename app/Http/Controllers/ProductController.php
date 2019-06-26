<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
use App\Product;
use App\Category;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $product = Product::all();
        //USE THIS METHOD ELOQUENT DISPLAY
        // $arr = array();
        // foreach($product as $products){
        //     $arr[]=array(
        //         'prod_id'=>$products->id,
        //         'prod_name'=>$products->name,
        //         'category'=>$products->categories->name,
        //     );        
        // }
        $products = Product::latest()->paginate(5);
        return view('pages.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.createProduct',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('product.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        // $category = Category::all();
        // return view('pages.editProduct')->with($category);
        return view('pages.editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('product.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
