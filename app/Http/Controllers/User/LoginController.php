<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    // user login
    public function login(Request $request) {
        auth('admin')->logout();
        auth()->logout();
        $user = User::where('username' , $request->input('username'))->first();
        if(!$user) {
            return back()->with('error' , 'username or password not correct');
        }
        if(Hash::check($request->input('password') , $user->password)) {
            auth()->login($user);
            return redirect(route('user.dashboard'));
        }
        return back()->with('error' , 'username or password not correct');
    }
}
