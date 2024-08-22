<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SubmissionManagementController extends Controller
{
    public function index()
    {
        // $datas = DB::table('submissions')->get();

        $datas = DB::table('submissions')
        ->join('locations', 'submissions.locationId', '=', 'locations.id')
        ->join('userBusiness',  'submissions.businessId', '=', 'userBusiness.id')
        ->join('operatorCredentials', 'submissions.reviewedBy', '=', 'operatorCredentials.id')
        ->join('userCredentials', 'submissions.userId', '=', 'userCredentials.id')
        ->select('submissions.*', 'userCredentials.fullname as submittedBy', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userBusiness.businessName', 'operatorCredentials.fullname')
        ->get();

        return view('operators.submissionManagement.index', compact('datas'));
    }
    public function approveSubmission($submissionId)
    {
        $submissionData = DB::table('submissions')->where('id', $submissionId)->first();

        $data = DB::table('submissions')
        ->where('id', $submissionId)
        ->update(['status' => "approved"]);
        
        $dataLocation = DB::table('locations')
        ->where('id', $submissionData->locationId)
        ->update(['isAvailable' => "no"]);

        $insertPermit = DB::table('permits')
        ->insert([
            'submissionId' => $submissionData->id,
            'permitNumber' => "TEST",
            'issuedAt' => date('Y-m-d H:i:s'),
            'expiredAt' => date('Y-m-d H:i:s', strtotime('+1 year')),
        ]);

        return redirect('/operator/submissions');
        // return view('operators.submissionManagement.index', compact('datas'));
    }

    public function rejectSubmission($submissionId)
    {
        $data = DB::table('submissions')
        ->where('id', $submissionId)
        ->update(['status' => "rejected"]);
        
        return redirect('/operator/submissions');
    }

    // public function approveSubmission($permit)
    // {
    //     $data = DB::table('permits')->where('id', $permit)->first();
    //     return view('operators.userManagement.approveSubmission', compact('data'));
    // }
}