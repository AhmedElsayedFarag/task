<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }//end dashboard

    public function editProfile(){
        $user = auth()->user();
        return view('admin.admin.edit',['user'=>$user]);
    }

    public function updateProfile(Request $request){
        $user = auth()->user();
        $user->fill($request->all())->save();
        Session::flash('message','Saved successfully');
        return redirect()->back();
    }

    public function log(){
        $notifications = \Spatie\Activitylog\Models\Activity::orderBy('id','desc')->paginate(10);
        return view('admin.log',['notifications'=>$notifications]);
    }

}
