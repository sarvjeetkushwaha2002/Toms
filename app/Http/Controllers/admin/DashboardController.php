<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard()
    {
        return view('admin.layouts.dashboard');
    }

    public function privacyPolicy()
    {
        return view('admin.web configration.privacy_policy');
    }
}
