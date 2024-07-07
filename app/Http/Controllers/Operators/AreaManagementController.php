<?php

namespace App\Http\Controllers\Operators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AreaManagementController extends Controller
{
    public function index()
    {
        $datas = DB::table('areas')->get();
        return view('operators.areaManagement.index', compact('datas'));
    }
    public function edit($areaId)
    {
        $data = DB::table('areas')->where('id', $areaId)->first();
        return view('operators.areaManagement.edit', compact('data'));
    }
    public function update(Request $request, $areaId)
    {
        DB::table('areas')->where('id', $areaId)->update([
            'areaName' => $request->areaName,
            'areaCode' => $request->areaCode,
            'areaFacilities' => $request->areaFacilities,
        ]);
        return redirect('/operator/areas');
    }
    public function create()
    {
        return view('operators.areaManagement.create');
    }
    public function store(Request $request)
    {
        DB::table('areas')->insert([
            'areaName' => $request->areaName,
            'areaCode' => $request->areaCode,
            'areaFacilities' => $request->areaFacilities,
        ]);
        return redirect('/operator/areas');
    }
    public function destroy($areaId)
    {
        DB::table('areas')->where('id', $areaId)->delete();
        return redirect('/operator/areas');
    }
}
