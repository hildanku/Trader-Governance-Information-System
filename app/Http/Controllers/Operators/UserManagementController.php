<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserManagementController extends Controller
{
    public function index()
    {
        $datas = DB::table('userCredentials')->get();

        return view('operators.userManagement.index', compact('datas'));
    }

    public function create()
    {
        return view('operators.userManagement.create');
    }
}