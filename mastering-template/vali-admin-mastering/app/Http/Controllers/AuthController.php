<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('admin.auth.register');
    }
    public function processRegister(AdminRequest $request){
        // dd('ok');
        // echo('ok');
        // print_r($request->name);
        // validation, inset to db, redirect with success msg
        // $this->validate($request,[
        //     'name' => 'required|min:3|max:10',
        //     'email' => 'required|email|unique:admins,email',
        //     'password' => 'required|min:6|confirmed',
        // ]);
        $newAdmin = new Admin;
        // $newAdmin->name = $request->name;
        // $newAdmin->email = $request->email;
        // $newAdmin->password = $request->password;
        // $newAdmin->save();
        // print_r($newAdmin);
        // return $newAdmin;
       
        $newAdmin->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
       return redirect()->back(); 
    }
}
