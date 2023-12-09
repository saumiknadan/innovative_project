<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('home.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product_name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'thumbnail_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'product_name.unique' => 'Product name already exists. Please choose a different name.',
        ]);
        
        $product = new Product;
        $product->id = $request->product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('thumbnail_image')) {
            $product->thumbnail_image = $request->file('thumbnail_image')->store('prod_thumbnail');
        }

        $product->save();
        return redirect('/products')->with('message', 'Product added successfully');
    }

  

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product=product::find($id);
        return view('home.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('home.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'thumbnail_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

       
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('thumbnail_image')) {
            $product->thumbnail_image = $request->file('thumbnail_image')->store('prod_thumbnail');
        }

        
        $product->save();
        
        return redirect('/products')->with('message', 'Product updated successfully');
    }

    public function change_status(Product $product)
    {
        //
        if($product->status==1)
        {
            $product->update(['status'=>0]);
        }
        else
        {
            $product->update(['status'=>1]);
        }

        return redirect()->back()->with('message','Product status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();

        if($delete)
            return redirect()->back()->with('message','Product deleted successfully');
    }
}
