<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
        // echo 'Login form';
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=>$request->password])) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error', 'Incorrect Email or Password');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
