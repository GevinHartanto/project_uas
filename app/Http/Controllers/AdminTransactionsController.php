<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Product;
use App\Category;
use App\Http\Requests\TransactionsRequest;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Session;


class AdminTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$transactions = Transaction::all();
		$products = Product::get();
		$users = User::get();
		return view('admin.transaction.index', compact('transactions', 'products', 'users'));
		
		
		//$request->session()->put('id', 'name');
		//$request->get('name');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		//$users = Auth::user('name', 'id')->get();
		$products = Product::lists('name', 'id')->all();
		$users = User::lists('name', 'id')->all();
		return view('admin.transaction.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionsRequest $request)
    {
        //
		$input = $request->all();
		$users = Auth::user();
		
		$users->transaction()->create($input);
		//Transaction::create($input);
		return redirect('/admin/transaction');
		
		//return $request->all();
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
		$transactions = Transaction::findOrFail($id);
		$products = Product::lists('name', 'id')->all();
		return view('admin.transaction.edit', compact('products', 'transactions'));
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
		$transactions = Transaction::findOrFail($id);
		
		$input = $request->all();
		$transactions->update($input);
		
		return redirect('/admin/transaction');
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
		$transactions = Transaction::findOrFail($id);
		$transactions->delete();
		
		Session::flash('deleted_transaction', 'The Transaction has been deleted.');
		
		return redirect('/admin/transaction');
		
		
    }
}
