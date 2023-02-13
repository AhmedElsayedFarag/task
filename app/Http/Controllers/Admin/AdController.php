<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdController extends Controller
{

    public function index()
    {
        $ads = Ad::orderBy('id','desc')->get();
        return view('admin.ads.index',['data'=>$ads]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('admin.ads.edit',['ad'=>$ad]);
    }


    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $data = $request->all();
        if ($request->has('featured')){
            $data['featured'] = true;
        }else{
            $data['featured'] = false;
        }
        $ad->fill($data)->save();
        Session::flash('message','Updated successfully');
        return redirect()->route('admin.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ad::findOrFail($id)->delete();
        return redirect()->back();
    }
}
