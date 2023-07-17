<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Closure;
class LoginAdminController extends Controller
{

    // View login admin dashboard
    public function index()
    {
        return view('admin.login_adm', ['title' => 'Admin Login']);
    }
    public function store(Request $request)
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
            'role'=>1
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        session()->flash('error', 'Incorrect email or password.');
        return redirect()->back();
    }
}
