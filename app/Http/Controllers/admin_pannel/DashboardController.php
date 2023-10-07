<?php

namespace App\Http\Controllers\admin_pannel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminPannel()
    {
        return view('admin_pannel.layouts.dashboard');
    }
    public function loginPage()
    {
        return view('admin_pannel.login.login');
    }
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('admin.adminPannel');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Email and Password!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
