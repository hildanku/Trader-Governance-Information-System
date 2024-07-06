<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\UserCredential;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('Auth.trader');
    }
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('userCred')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('trader/dashboard');
        }
        return Redirect::back()->with('error', 'Username atau Password salah');
    }
}
