<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productimages=ProductImage::all();
        return view('home.prod_image.index', compact('productimages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        return view('home.prod_image.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productimage = new ProductImage;
        $productimage->id = $request->productimage;
        $productimage->product_id = $request->product;

        if (ProductImage::where('product_id', $productimage->product_id)->exists()) {
            return redirect()->back()->with('error', 'Product ID must be unique for each image.');
        }

        $images = array();
        if($files=$request->file('file')){
            $i=0;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileNameExtract = pathinfo($name);
                $fileName = $fileNameExtract['filename'] . time() . $i . '.' . $fileNameExtract['extension'];
                
                // Save the image to the public/prod_image directory
                $file->move('prod_image', $fileName);
                
                // Save the image name to the array
                $images[] = $fileName;
                
                $i++;
            }
            if (!empty($images)) {
                // Save the image names as a pipe-separated string
                $productimage->image = implode("|", $images);
    
                // Save the ProductImage model to the database
                $productimage->save();
    
                return redirect('/productimages')->with('message', 'Images added successfully');
            }    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productimage)
    {
        $delete = $productimage->delete();

        if($delete)
            return redirect()->back()->with('message','ProductImage deleted successfully');
    }
}
