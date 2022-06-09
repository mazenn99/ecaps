<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{




    /*
     * User Dashboard Index
     */

    public function dashboard() {
        return view('user.dashboard.index');
    }


    /*
     * Logout
     */
    public function logout(Request $request) {
        auth()->logout();
        return redirect(route('user.login.view'));
    }
}
