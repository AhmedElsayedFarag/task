<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategryResource;
use App\Http\Resources\HomeAdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Setting;
use App\Traits\apiResponseTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use apiResponseTrait;
    public function home(){
        $categories = Category::where('parent_id',0)->get();
        $ads = Ad::orderBy('id','DESC')->get();
        return $this->apiResponse(config('globals.success_code'),[
            'categories' => CategryResource::collection($categories),
            'ads' => HomeAdResource::collection($ads)
        ],[]);
    }

    public function staticData($name){
        $data = Setting::where('key',$name)->first();
        return $this->apiResponse(config('globals.success_code'),$data->value,[]);
    }

    public function faq(){
        $faq = Faq::all();
        return $this->apiResponse(config('globals.success_code'),$faq,[]);

    }
}
