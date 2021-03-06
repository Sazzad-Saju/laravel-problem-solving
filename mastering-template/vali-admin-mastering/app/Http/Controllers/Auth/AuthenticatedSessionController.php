<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{


    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        // foreach ($request as $sku){ 
        //     // Code Here
        //     dd($sku);
        //     }
        
        $data = $request->session()->all();
        // dd($data);
        // if($request->session()->has('_token'))
        // {
        //     print_r('yes');
        // }
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        
        $request->session()->invalidate();
        // $request->session()->destroy();

        // $request->session()->regenerateToken();
        toast('You have logged out!','warning');
        return redirect('/');
    }
}
