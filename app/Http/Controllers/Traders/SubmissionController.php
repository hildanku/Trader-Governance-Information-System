<?php

namespace App\Http\Controllers\Traders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index()
    {
        $user = Auth::guard('userCred')->user();

        // $datas = DB::table('submissions')->where('userId', $user->id)->get();
        
        $datas = DB::table('submissions')
        ->join('locations', 'submissions.locationId', '=', 'locations.id')
        ->join('userbusiness',  'submissions.businessId', '=', 'userbusiness.id')
        ->join('operatorcredentials', 'submissions.reviewedBy', '=', 'operatorcredentials.id')
        ->select('submissions.*', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userbusiness.businessName', 'operatorcredentials.fullname')
        ->where('submissions.userId', $user->id)
        ->get();
        
        return view('traders.submissionManagement.index', compact('datas'));
    }
    public function create()
    {
        $user = Auth::guard('userCred')->user();

        // $dataDetail = DB::table('userdetails')->where('userId', $user->id)->first();
        $dataId = $user->id;
        $dataLocations = DB::table('locations')->where('isAvailable', 'yes')->get();
        
        $dataBusiness = DB::table('userBusiness')->where('userId', $user->id)->get();

        return view('traders.submissionManagement.create', compact('dataId', 'dataLocations', 'dataBusiness'));
        // return view('traders.submissionManagement.create', compact('data'));
        
        // return $dataId; 
    }
    
    public function store(Request $request)
    {
        $user = Auth::guard('userCred')->user();
        $userId = $user->id;
        DB::table('submissions')->insert([
            'userId' => $request->userId,
            'businessId' => $request->businessId,
            'locationId' => $request->locationId,
            'reviewedBy' => 1,
        ]);
        return redirect('/trader/submission');
    }

    public function destroy($id)
    {
        DB::table('submissions')->where('id', $id)->delete();
        return redirect('/trader/submission');
    }

    public function detail($id)
    {
        
        $data = DB::table('submissions')
        ->join('locations', 'submissions.locationId', '=', 'locations.id')
        ->join('userbusiness', 'submissions.businessId', '=', 'userbusiness.id')
        ->join('operatorcredentials', 'submissions.reviewedBy', '=', 'operatorcredentials.id')
        ->select('submissions.*', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userbusiness.businessName', 'operatorcredentials.fullname')
        ->where('submissions.id', $id)
        ->first();

        return view('traders.submissionManagement.detail', compact('data'));
    }   
}