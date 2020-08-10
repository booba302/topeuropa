<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Imports\ProductsImport;
use Auth;
use Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $path1 = $request->file('file')->store('temp');
        $path = storage_path('app').'/'.$path1;
        Excel::import(new ProductsImport, $path);
        
        return redirect()->route('product.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status($id)
    {
        $products = Products::where('id','=',$id)->get();
        foreach($products as $product){
            $pro = $product->id_status;
        }
        if($pro == 1){
            Products::find($id)->update(['id_status' => 2]);
        }else if($pro == 2){
            Products::find($id)->update(['id_status' => 1]);
        }
        return redirect()->route('product.index');
    }
}
