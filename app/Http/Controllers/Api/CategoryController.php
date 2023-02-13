<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryOptionResource;
use App\Http\Resources\CategryResource;
use App\Http\Resources\OptionValueResource;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Traits\apiResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use apiResponseTrait;
    public function getAllCategories(){
        $categories = Category::where('parent_id',0)->get();
        return $this->apiResponse(config('globals.success_code'),CategryResource::collection($categories),[]);
    }
    public function getCategoryOptions($id){
        $cat = Category::findOrFail($id);
        return $this->apiResponse(config('globals.success_code'),CategoryOptionResource::collection($cat->category_options),[]);
    }
    public function getOptionValues($id){
        $opt = Option::findOrFail($id);
        return $this->apiResponse(config('globals.success_code'),OptionValueResource::collection(OptionValue::where('option_id',$opt->id)->get()),[]);
    }
}
