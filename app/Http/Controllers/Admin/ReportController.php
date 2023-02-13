<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{

    public function index()
    {
        $reports = AdReport::latest()->get();
        return view('admin.reports.index',['data'=>$reports]);
    }


    public function show($id)
    {
        $report = AdReport::findOrFail($id);
        return view('admin.reports.show',['data'=>$report]);
    }

    public function edit($id)
    {
        $report = AdReport::findOrFail($id);
        return view('admin.reports.edit',['data'=>$report]);
    }

    public function update(Request $request, $id)
    {
        $report = AdReport::findOrFail($id)->fill($request->except('_method','_token'))->Save();
        Session::flash('message','Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $report = AdReport::findOrFail($id)->delete();
        return redirect()->back();
    }
}
