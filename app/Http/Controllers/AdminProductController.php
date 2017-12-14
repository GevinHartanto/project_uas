<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Photo_Product;
use App\Category;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$products = Product::all();
		return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$categories = Category::lists('name', 'id')->all();
		return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
		//
		$input = $request->all();
		
		Product::create($input);
		return redirect('/admin/product');

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
		$products = Product::findOrFail($id);
		$categories = Category::lists('name', 'id')->all();
		return view('admin.product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        //
		$products = Product::findOrFail($id);
		$input = $request->all();
		
		$products->update($input);
		return redirect('/admin/product');
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
		$products = Product::findOrFail($id);
		$products->delete();
		
		Session::flash('deleted_product', 'The Product has been deleted.');
		return redirect('/admin/product');
		
    }
}
