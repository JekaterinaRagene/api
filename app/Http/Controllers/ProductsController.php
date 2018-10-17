<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Products;
use App\Http\Resources\Products as ProductsResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get product
        $product = Products::paginate(15);
        
        //Return collection of product as a resource
        return ProductsResource::collection($product);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = $request->isMethod('put') ? Product::findOrFail
                ($request->products_id) : new Product;
        
        $products->id = $request->input('products_id');
        $products->title = $request->input('title');
        $products->body = $request->input('body');
        
        if($products->save()) {
            return new ProductsResource($products);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get product
        $products = Products::findOrFail($id);
        
        //Return a single product as a resource
        return new ProductsResource($products);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get product
        $products = Products::findOrFail($id);
        
        if($products->delete()) {
            return new ProductsResource($products);
        }
    }
}
