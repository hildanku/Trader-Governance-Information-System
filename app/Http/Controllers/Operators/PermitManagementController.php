<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermitManagementController extends Controller
{
    public function index()
    {
        $datas = DB::table('permits')
        ->join('submissions', 'permits.submissionId', '=', 'submissions.id')
        ->join('userbusiness',  'submissions.businessId', '=', 'userbusiness.id')
        ->select('permits.*', 'submissions.id', 'userbusiness.businessName')
        ->get();
        return view('operators.permitManagement.index', compact('datas'));
    }
}