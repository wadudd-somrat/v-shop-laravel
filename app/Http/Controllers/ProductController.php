<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Product::where('status',1)->get();
        return view('backend.product.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('parent_id',0)->pluck('name','id')->all();
        return view('backend.product.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'menu_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'weight' => 'required',
                'details' => 'required',
            ]);


            $file = $request->file('image');
            if ($request->file('image') !== null)
            {
                $fileName   = time() . $file->getClientOriginalName();
                $file_name  = $file->getClientOriginalName();
                $file_type  = $file->getClientOriginalExtension();
                $path = $file->storeAs('public/product-images', $fileName);
                $filePath   = $path . $fileName;
            }

            $product = new Product();
            $product->menu_id= $request->menu_id;
            $product->name= $request->name;
            $product->price= $request->price;
            $product->weight= $request->weight;
            $product->details= $request->details;
            $product->image= $fileName;
            $product->save();

            return redirect()->route('products')->with('success', 'Data Insert Successfully');

        }catch (\Exception $e){
            return redirect()->route('products.create')->with('error',$e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Product::where('id',$id)->first();
        return view('backend.product.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::where('parent_id',0)->pluck('name','id')->all();
        $result = Product::where('id',$id)->first();
        return view('backend.product.edit',compact('menus','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $validated = $request->validate([
                'menu_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'weight' => 'required',
                'details' => 'required',
            ]);

            $product = Product::where('id',$id)->first();
            if ($request->file('image') !== null)
            {
                Storage::delete('public/product-images/'.$product->image);
                $file = $request->file('image');
                $fileName   = time() . $file->getClientOriginalName();
                $file_name  = $file->getClientOriginalName();
                $file_type  = $file->getClientOriginalExtension();
                $path = $file->storeAs('public/product-images', $fileName);
                $filePath   = $path . $fileName;
                $product->update([
                    'image' => $fileName
                ]);
            }

            $product->update([
                'menu_id' => $request->menu_id,
                'name' => $request->name,
                'price' => $request->price ,
                'weight' => $request->weight,
                'details' => $request->details
            ]);

            return redirect()->route('products')->with('success', 'Data Update Successfully');

        }catch (\Exception $e){
            return redirect()->route('products.edit')->with('error',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::where('id',$id)->update([
                'status' => 0
            ]);
            return redirect()->route('products')->with('success','Data Delete Successfully');
        }catch (\Exception $e){
            return redirect()->route('products')->with('error',$e->getMessage());
        }

    }
}
