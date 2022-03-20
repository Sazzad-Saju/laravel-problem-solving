<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Exception;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB; //check db connection
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
        {
            // $this->middleware('guest')->except('logout');
            // $this->middleware('guest:admin')->except('logout');
           // $this->middleware('guest:writer')->except('logout');
        }

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
        // try {
        //     \DB::connection()->getPDO();
        //     dump('Database connected: ' . \DB::connection()->getDatabaseName());
        // } catch (QueryException $e) {
        //     if ($e->getCode() === 2002) {
        //         toast('Sorry! Database Connection Refused','error');
        //         return redirect()->back();
        //      } 
        //      throw $e;
        // }
        try{
            $newAdmin->create([
                'name'=>$request->name,
                'email'=>$request->email,
                // 'password'=>bcrypt($request->password)
                'password'=>Hash::make($request->password),
            ]);
            // Alert::success('Congrats', 'You\'ve Successfully Registered! Click OK to login');
            toast('Successfully Created Account!','success');
            // return redirect()->back()->with('message','Successfully registered! Click OK to login...');
            return redirect('/'); 
            // return redirect('/')->with('success','Successfully registered!');
        }catch(Exception $e){
            toast('Something went wrong!','error');
            return redirect()->back();
        }
    }
    /* Login Done via breeze */
    /*
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function processLogin(Request $request){
        // return $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);
        if(auth()->guard('admin')->attempt($credentials)){
          //  $request->session()->regenerate();
            return redirect('/dashboard');
            // return "success";
        }else{
            toast('Incorrect Credential!','error');
            return back();
            // return 'Failed';
        }
        
        // return redirect()->back();
        // $userInfo = Admin::where('email','=',$request->email)->first();
        // if(!$userInfo){
        //     toast('Email not found!','error');
        //     return back();
        // }else{
        //     if(Hash::check($request->password,$userInfo->password)){
        //         return redirect('/dashboard');
        //     }else{
        //         toast('Password is incorrect!','error');
        //         return back();
        //     }
        // }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        toast('You have logged out!','warning');
        return redirect('/login'); 
    }
    */
}
