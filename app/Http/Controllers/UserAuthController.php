<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

    public function register()
    {
        return view('Auth.traderRegister');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:usercredentials'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usercredentials'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::table('usercredentials')->insert([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return Redirect::route('trader.dashboard')->with('success', 'Registrasi Berhasil!');
    }
}
