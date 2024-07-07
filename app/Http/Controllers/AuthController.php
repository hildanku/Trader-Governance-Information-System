<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\OperatorCredential;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            return redirect('/operator/dashboard');
        }
        return view('Auth.login');
    }
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/operator/dashboard');
        }
        // $credentials = $request->only('username', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect('/admin/dashboard');
        // }
        return Redirect::back()->with('error', 'Username atau Password salah');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/home');
    }

    public function register()
    {

        return view('auth.register');

    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:operatorcredentials,username',
            'email' => 'required|email|unique:operatorcredentials,email',
            'password' => 'required|min:8',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        OperatorCredential::create($input);
        return Redirect::back()->with('success', 'Registrasi Berhasil');
    }

}
