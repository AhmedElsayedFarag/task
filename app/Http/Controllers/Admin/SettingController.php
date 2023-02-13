<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index',['settings'=>$settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $locales = config('globals.locales');
        foreach ($request->name as $key=>$value){
            $setting = Setting::find($key);
            foreach ($locales as $locale) {
                $setting->translateOrNew($locale)->value = $value[$locale];
            }
            $setting->save();
        }//end foreach
        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.settings.index');
    }


}
