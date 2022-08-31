<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MyController extends Controller
{

	public function index() {
	   return view('auth.registerseller')->layout('layouts.base');
	}

	public function addseller(Request $request) {

		$request->validate([
			'name'=>'required',
			'email'=>'required|unique:users',
			'password'=>'required|min:10',
			'password_confirmation'=>'required|same:password'
			]);

		/*	$users=User::All();
		foreach($users as $user) 
    	{
    		if($user->email==$request->email) 
    		{
    			return redirect()->back()->with('emailerror', 'The requested email already exists! Please use another one!');
    		}
    	}
    	*/
		{
		$data=new user;
		$data->name=$request->name;
		$data->email=$request->email;
		$data->password=bcrypt($request->password);
		$data->utype='ENT';
		$data->save();
		return redirect()->route('login');
    	}

	}

}