<?php

namespace App\Http\Controllers\Traders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Dompdf\Dompdf;
use Dompdf\Options;


class SubmissionController extends Controller
{
    public function index()
    {
        $user = Auth::guard('userCred')->user();

        // $datas = DB::table('submissions')->where('userId', $user->id)->get();
        
        $datas = DB::table('submissions')
        ->join('locations', 'submissions.locationId', '=', 'locations.id')
        ->join('userBusiness',  'submissions.businessId', '=', 'userBusiness.id')
        ->join('operatorCredentials', 'submissions.reviewedBy', '=', 'operatorCredentials.id')
        ->select('submissions.*', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userBusiness.businessName', 'operatorCredentials.fullname')
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
        ->join('userBusiness', 'submissions.businessId', '=', 'userBusiness.id')
        ->join('operatorCredentials', 'submissions.reviewedBy', '=', 'operatorCredentials.id')
        ->select('submissions.*', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userBusiness.businessName', 'userBusiness.businessType', 'operatorCredentials.fullname')
        ->where('submissions.id', $id)
        ->first();

        return view('traders.submissionManagement.detail', compact('data'));
    }   
    public function printPdf($submissionId)
    {
    $data = DB::table('permits')
    ->join('submissions', 'permits.submissionId', '=', 'submissions.id')
    ->join('locations', 'submissions.locationId', '=', 'locations.id')
    ->join('userBusiness', 'submissions.businessId', '=', 'userBusiness.id')
    ->join('operatorCredentials', 'submissions.reviewedBy', '=', 'operatorCredentials.id')
    ->select('permits.*', 'submissions.*', 'userBusiness.businessOwner', 'locations.locationCode', 'locations.locationLatitude', 'locations.locationLongitude', 'userBusiness.businessName', 'operatorCredentials.fullname')
    ->where('submissions.id', $submissionId)
    ->first();

    // Load view content
    $html = view('printPdf', compact('data'))->render();

    // Setup Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    // (Optional) Setup paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (inline or download)
    return $dompdf->stream('submission_' . $data->id . '.pdf');
    }
}