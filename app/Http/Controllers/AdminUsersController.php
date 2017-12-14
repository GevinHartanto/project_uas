<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Photo_User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$users = User::all()->sortBy('id');
		return view('admin.users.index', compact('users'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('admin.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
		//return view('admin.users.store');
		//User::create($request->all());
		
		if(trim($request->password) == '')
		{
			$input = $request->except('password');
		}
		else{
			$input = $request->all();
			$input['password'] = bcrypt($request->password);
		}
		
		//$input = $request->all();
		
		//jika user mengupload file, maka ini akan dijalankan
		if($file = $request->file('photo_id'))
		{
			//set nama file --> waktu + nama original file
			$name = time() .$file->getClientOriginalName();
			
			//move file to image folder
			$file->move('images_user', $name);
			
			//buat object photo dari file yang diupload
			$photo = Photo_User::create(['file'=>$name]);
			
			//set photo_id
			$input['photo_id'] = $photo->id;	
		}
		
		//enkrip password sebelum di simpan ke database
		//$input['password'] = bcrypt($request->password);
		//simpan ke database
		User::create($input);
		
		return redirect('/admin/users');
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
		return view('admin.users.show');
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
		$user = User::findorFail($id);
		return view('admin.users.edit', compact('user'));
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
		$user = User::findOrFail($id);
		
		if(trim($request->password) == ''){
			$input = $request->except('password');
		}
		else{
			$input = $request->all();
			$input['password'] = bcrypt($request->password);
		}

		//$input = $request->all();
		
		if($file = $request->file('photo_id')){
			$name = time() . $file->getClientOriginalName();
			$file->move('images_user', $name);
			$photo = Photo_User::create(['file'=>$name]);
			$input['photo_id'] = $photo->id;
		}
		
		$user->update($input);
		
		return redirect('/admin/users');
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
		User::findOrFail($id)->delete();
		Session::flash('deleted_user', 'The user has been deleted.');
		return redirect('/admin/users');
    }
}
