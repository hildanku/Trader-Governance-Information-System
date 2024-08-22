<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        // ordinary user can't be here
        if (!Auth::guard('web')->check()) {
            return redirect('/operator/login');
        }
        return view('operators.dashboard');
    }
}