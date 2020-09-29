<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Exports\csvExport;
use App\Imports\csvImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'product_name' => 'required',
            'product_description' => 'required',
            'quantity' =>   'required',
            'unit_price' => 'required'
        ]);
        $products=new products([ 
            'product_name' => $request->get('product_name'),
            'product_description' => $request->get('product_description'),
            'quantity' => $request->get('quantity'),
            'unit_price' => $request->get('unit_price')
        ]);
        $products->save();
        return redirect('/products')->with('success','Product Added!');
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
        $products=Products::find($id);
        return view('products.edit',compact('products'));
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
        $request->validate([
            'product_name'=>'required',
            'quantity'=>'required',
            'unit_price' => 'required'
        ]);
        $products=Products::find($id);
        $products->product_name=$request->get('product_name');
        $products->product_description=$request->get('product_description');
        $products->quantity=$request->get('quantity');
        $products->unit_price=$request->get('unit_price');
        $products->save();
        return redirect('/products')->with('sucess','Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Products::find($id);
        $products->delete();
        return redirect('/products')->with('success','Products Deleted!');
    }

    public function csv_export()
    {
        //return view('csv_file');
        return Excel::download(new csvExport,'sample.csv');
    }
    public function csv_import(){
        Excel::import(new csvImport,request()->file('file'));
        return back();
    }
}
