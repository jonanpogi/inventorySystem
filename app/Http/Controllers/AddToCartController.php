<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Product;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function index()
    {
        //select() function doesnt need anymore 
        $prod_user = DB::table('products')
                    ->join('product_user', function($join){
                        $join->on('product_user.product_id', '=', 'products.id');
                    })->where('user_id', Auth::user()->id)->paginate(5);
        
        $price = Auth::user()->products()->sum('price');
        
                    return view('pages.viewCart', compact('prod_user','price'));
    }

    public function addToCart($id)
    {

        DB::table('product_user')->insert([
            'user_id' => Auth::user()->id ,
            'product_id' => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
   
        return redirect()->route('product.index')->with('success','Added To Cart successfully.');
    }

    public function destroy($id)
    {
        DB::table('product_user')->where('id', $id)->delete();
  
        return redirect()->route('product.index')->with('success','Removed successfully');
    }
}
