<?php

namespace App\Http\Controllers\admin_pannel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminPannel()
    {
        return view('admin_pannel.layouts.dashboard');
    }
}
