<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{



    /*
     * login controller
     */
    public function login(Request $request) {
        if(auth('admin')->attempt($request->only('email' , 'password'))) {
            return redirect(route('dashboard.index'));
        }
        return back()->with('error' , 'email or password not correct');
    }
}
