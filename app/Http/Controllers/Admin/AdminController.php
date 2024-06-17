<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
        if(Auth::check()) {

            $roles = Auth::check() ? Auth::user()->userRole->pluck('name')->toArray() : [];

            if (in_array('admin', $roles)) {
                return redirect()->route('admindashboard');
            } else if (in_array('subAdmin', $roles)) {
                return redirect()->route('admindashboard');
            } else {
                return redirect()->route('userdashboard');
            }

            return redirect('/');
        }else{
            return view('admin.auth.login');
        }

    }

//    public function authenticate(Request $request){
////        dd($request);
//        // Retrive Input
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//            dd('dd');
//            // if success login
//            $roles = Auth::check() ? Auth::user()->userRole->pluck('name')->toArray() : [];
//
//            dd($roles);
//            return redirect()->route('admindashboard');
//
//            //return redirect()->intended('/details');
//        }
//        // if failed login
////        return redirect('login');
//    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
