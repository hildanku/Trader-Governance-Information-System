<?php

namespace App\Http\Controllers\Traders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = Auth::guard('userCred')->user();
        return view('traders.dashboard');
    }
}