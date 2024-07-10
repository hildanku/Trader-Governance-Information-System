<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LocationManagementController extends Controller
{
    public function index()
    {
        // $datas = DB::table('locations')->get();
        $datas = DB::table('locations')
        ->join('areas', 'locations.areaId', '=', 'areas.id')
        ->select('locations.*', 'areas.areaName')
        ->get();
        return view('operators.locationManagement.index', compact('datas'));
    }

    public function create()
    {
        return view('operators.locationManagement.create');
    }

    public function store(Request $request)
    {
        DB::table('locations')->insert([
            'locationCode' => $request->locationCode,
            'locationDescription' => $request->locationDescription,
            'locationLatitude' => $request->locationLatitude,
            'locationLongitude' => $request->locationLongitude,
            'areaId' => 1,
        ]);
        return redirect('/operator/locations');
    }

    public function edit($locationId)
    {
        $data = DB::table('locations')->where('id', $locationId)->first();
        return view('operators.locationManagement.edit', compact('data'));
    }

    public function update(Request $request, $locationId)
    {
        DB::table('locations')->where('id', $locationId)->update([
            'locationCode' => $request->locationCode,
            'locationDescription' => $request->locationDescription,
            'locationLatitude' => $request->locationLatitude,
            'locationLongitude' => $request->locationLongitude,
        ]);
        return redirect('/operator/locations');
    }

    public function destroy($locationId)
    {
        DB::table('locations')->where('id', $locationId)->delete();
        return redirect('/operator/locations');
    }
}