<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryOption;
use App\Models\Option;
use App\Traits\saveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    use saveImageTrait;
    public function index(Request $request)
    {
        $data = [];
        if ($request->has('cat_id')){
            $data['data'] = Category::where('parent_id',$request->cat_id)->get();
            $data['category'] = Category::findOrFail($request->cat_id);
        }else{
            $data['data'] = Category::where('parent_id',0)->get();
        }
        return view('admin.categories.index',$data);
    }


    public function create(Request $request)
    {
        if ($request->has('cat_id')){
            $parent_id = $request->cat_id;
        }else{
            $parent_id = 0;
        }
        return view('admin.categories.create',['parent_id'=>$parent_id]);
    }


    public function store(Request $request)
    {
        $category = Category::create($request->except('name'));
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $category->translateOrNew($locale)->name = $request->name[$locale];
        }
        $category->save();
        Session::flash('message','Saved successfully');
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        $categories = Category::where('parent_id',$id)->get();
        return view('admin.categories.index',['data'=>$categories]);
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',['data'=>$category]);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->except('name'));
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $category->translateOrNew($locale)->name = $request->name[$locale];
        }
        $category->save();
        Session::flash('message','Saved successfully');
        return redirect()->route('admin.categories.index');
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function options($id){
        $category = Category::findOrFail($id);
        $cat_options = $category->options->pluck('id')->toArray();
        $cat_options_relation = $category->category_options;
        $options = Option::all();
        return view('admin.categories.options',[
            'category'=>$category,
            'options'=>$options,
            'cat_options'=>$cat_options,
            'cat_options_relation'=>$cat_options_relation,
            ]);
    }
    public function assignOption($cat_id,$option_id,$status=0){
        $cat_option =  CategoryOption::where([
            ['category_id',$cat_id],['option_id',$option_id]
        ])->first();
        if ($cat_option){
            //update status
            $cat_option->required = $status;
            $cat_option->save();
        }else{
            $cat_option = new CategoryOption();
            $cat_option->category_id = $cat_id;
            $cat_option->option_id = $option_id;
            $cat_option->required = $status;
            $cat_option->save();
        }
        Session::flash('message','Saved successfully');
        return redirect()->back();
    }//end assignOption
    public function removeOption($cat_id,$option_id){
        $cat_option =  CategoryOption::where([
            ['category_id',$cat_id],['option_id',$option_id]
        ])->first()->delete();
        return redirect()->back();
    }


}
