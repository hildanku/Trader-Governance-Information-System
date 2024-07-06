<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('operators.dashboard');
    }
}