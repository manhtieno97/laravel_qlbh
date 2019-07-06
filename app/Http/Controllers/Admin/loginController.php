<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Auth;
class loginController extends Controller
{
    public function getLogin()
    {
    	return view('backend.login');
    }
    public function postLogin(loginRequest $request)
    {
    	$arr=['email'=>$request->email,'password'=>$request->password];
    	if($request->remember='Remember Me')
    	{
    		$remember=true;
    	}else{
    		$remember=false;
    	}
        if(Auth::attempt($arr,$remember)){
        	return redirect()->intended('admin/home');
        }
        else{
        	return back()->withInput()->with('error','Tài khoản mật khẩu không đúng!');
        }
    }
}
