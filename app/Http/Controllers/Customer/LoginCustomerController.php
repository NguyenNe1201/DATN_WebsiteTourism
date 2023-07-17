<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class LoginCustomerController extends Controller
{
    public function store_cus(Request $request)
    {
        // dd($request->input());
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => 0
        ], $request->input('remember'))) {
            return redirect()->back();
        }
        session()->flash('error', 'Incorrect email or password.');
        return redirect()->back();
    }
    // check login customer
    public function checkLoginCus(Request $request){
        $loggedIn = Auth::check();
        $userRole = $loggedIn ? Auth::user()->role : null;
        return response()->json([
            'loggedIn' => $loggedIn,
            'userRole' => $userRole
        ]);
    }
}
