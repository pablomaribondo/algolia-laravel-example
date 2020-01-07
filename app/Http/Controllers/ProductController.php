<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $products = Product::search($request->search)->paginate(10);
        }else{
            $products = Product::paginate(10);
        }
        return view('product-index',compact('products'));
    }


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function create(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'quantity'=>'required'
        ]);

        $products = Product::create($request->all());

        return back();
    }
}
