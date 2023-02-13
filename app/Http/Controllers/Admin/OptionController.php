<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OptionResource;
use App\Models\Option;
use App\Models\OptionValue;
use App\Traits\saveImageTrait;
use App\Traits\viewAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{
    use saveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        return view('admin.options.index',['data'=>$options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.options.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = Option::create($request->except('name'));
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $option->translateOrNew($locale)->name = $request->name[$locale];
        }
        $option->save();
        Session::flash('message','Saved successfully');
        return redirect()->route('admin.options.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::findOrFail($id);
        return view('admin.options.edit',['data'=>$option]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $option = Option::findOrFail($id);
        $option->update($request->except('name'));
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $option->translateOrNew($locale)->name = $request->name[$locale];
        }
        $option->save();
        Session::flash('message','Saved successfully');
        return redirect()->route('admin.options.index');
    }

    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return redirect()->back();
    }

    public function addValue($id,Request $request){
        $option = OptionValue::create([
            'icon'=>($request->icon)?$this->saveImage($request->icon,'options/values'):null,
            'option_id'=>$id
        ]);
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $option->translateOrNew($locale)->name = $request->name[$locale];
        }
        $option->save();
        Session::flash('message','Saved successfully');
        return redirect()->route('admin.options.index');
    }//end add_value

    public function deleteValue($id){
        OptionValue::findOrFail($id)->delete();
        return redirect()->back();
    }

}
