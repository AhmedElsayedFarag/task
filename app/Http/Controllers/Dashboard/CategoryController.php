<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategryResource;
use App\Models\Category;
use App\Models\CategoryOption;
use App\Traits\apiResponseTrait;
use App\Traits\saveImageTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use saveImageTrait,apiResponseTrait;


    public function store(Request $request){
        $category = Category::create([
            'image'=>$this->saveImage($request->image,'categories'),
            'parent_id'=>$request->parent_id
        ]);
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $category->translateOrNew($locale)->name = $request->name[$locale];
        }
        $category->save();
        return $this->apiResponse(config('globals.success_code'),new CategryResource($category),[]);
    }

    public function assignOption(Request $request){
        $cat_option = new CategoryOption();
        $cat_option->category_id = $request->category_id;
        $cat_option->option_id = $request->option_id;
        $cat_option->required = $request->required;
        $cat_option->save();
        return $this->apiResponse(config('globals.success_code'),new CategryResource(Category::find($request->category_id)),[]);
    }//end assignOption
}
