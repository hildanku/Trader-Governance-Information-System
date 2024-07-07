<?php

namespace App\Http\Controllers\Traders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function index()
    {
        // get user details
        $user = Auth::guard('userCred')->user();
        return view('traders.profile.index', compact('user'));
    }
}
