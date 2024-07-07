<?php

namespace App\Http\Controllers\Traders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserBusinessController extends Controller
{
    public function index()
    {
        $user = Auth::guard('userCred')->user();

        // $datas = DB::table('userbusiness')->where('userId', Auth::user()->id)->get();

        // $userdetail = DB::table('userdetails')->where('userId', $user->id)->first();
        
        $datas = DB::table('userBusiness')->where('userId', $user->id)->get();
        
        return view('traders.businessManagement.index', compact('datas'));
    }
    public function create()
    {
        // $user = Auth::guard('userCred')->user();

        // $data = DB::table('userdetails')->where('id', $user->id)->first();
        // return view('traders.businessManagement.create', compact('data'));
        return view('traders.businessManagement.create');
    }
    public function store(Request $request)
    {
       $user = Auth::guard('userCred')->user();
        DB::table('userBusiness')->insert([
            'userId' => $user->id,
            'businessName' => $request->businessName,
            'businessType' => $request->businessType,
            'businessOwner' => $request->businessOwner,
            'businessContactNumber' => $request->businessContactNumber,
        ]);
        return redirect('/trader/business');
    }

    public function edit($businessId)
    {
        $data = DB::table('userBusiness')->where('id', $businessId)->first();
        return view('traders.businessManagement.edit', compact('data'));
    }
    public function update(Request $request, $businessId)
    {
        DB::table('userBusiness')->where('id', $businessId)->update([
            'businessName' => $request->businessName,
            'businessType' => $request->businessType,
            'businessOwner' => $request->businessOwner,
            'businessContactNumber' => $request->businessContactNumber,
        ]);
        return redirect('/trader/business');
    }

    public function destroy($businessId)
    {
        DB::table('userBusiness')->where('id', $businessId)->delete();
        return redirect('/trader/business');
    }
}
