<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\OptionResource;
use App\Models\Option;
use App\Models\OptionValue;
use App\Traits\apiResponseTrait;
use App\Traits\saveImageTrait;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    use saveImageTrait,apiResponseTrait;
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $option = Option::create([
            'icon'=>($request->icon)?$this->saveImage($request->icon,'options'):null,
            'input_type'=>$request->input_type
        ]);
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $option->translateOrNew($locale)->name = $request->name[$locale];
        }
        $option->save();
        return $this->apiResponse(config('globals.success_code'),new OptionResource($option),[]);
    }

    public function add_value($id,Request $request){
        $option = OptionValue::create([
            'icon'=>($request->icon)?$this->saveImage($request->icon,'options/values'):null,
            'option_id'=>$id
        ]);
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $option->translateOrNew($locale)->name = $request->name[$locale];
        }
        $option->save();
        return $this->apiResponse(config('globals.success_code'),new OptionResource(Option::find($id)),[]);
    }//end add_value

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
