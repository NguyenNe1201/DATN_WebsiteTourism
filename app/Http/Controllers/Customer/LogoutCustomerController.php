<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogoutCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // logout dashboard admin
    public function perform_cus()
    {
        /**
         * Log out account user.
         *
         * @return \Illuminate\Routing\Redirector
         */
        Auth::logout();
        return redirect()->route('home');
    }
}
