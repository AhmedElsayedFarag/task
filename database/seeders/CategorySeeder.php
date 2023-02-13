<?php

namespace Database\Seeders;

use App\Http\Resources\CategryResource;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = Http::withHeaders(['lang'=>'en'])->get('https://staging.tajercom.com/api/categories');
        $cats = (json_decode($cats->body()))?json_decode($cats->body())->categories:[];
        foreach ($cats as $cat){
            $category = Category::create([
                'image'=>$cat->icon,
                'parent_id'=>0
            ]);

            $locales = config('globals.locales');
            foreach ($locales as $locale) {
                $cats = Http::withHeaders(['lang'=>$locale])->get('https://staging.tajercom.com/api/categories');
                $cats = (json_decode($cats->body()))?json_decode($cats->body())->categories:[];
                if (count($cats)){
                    $cats = collect($cats);
                    $current_cat = $cats->where('id','=',$cat->id)->first();
                    $category->translateOrNew($locale)->name = $current_cat->name;
                }
            }
            $category->save();
            //add sub cats
            $sub_cats = Http::withHeaders(['lang'=>'en'])->post('https://staging.tajercom.com/api/subcategories',[
                'category_id'=>$cat->id
            ]);
            $sub_cats = (json_decode($sub_cats->body()))?json_decode($sub_cats->body())->subcategories:[];
            foreach ($sub_cats as $sub_cat){
                $sub_category = Category::create([
//                    'image'=>$sub_cat->icon,
                    'parent_id'=>$category->id
                ]);

                $locales = config('globals.locales');
                foreach ($locales as $locale) {
                    $sub_cats = Http::withHeaders(['lang'=>$locale])->post('https://staging.tajercom.com/api/subcategories',[
                        'category_id'=>$cat->id
                    ]);
                    $sub_cats = (json_decode($sub_cats->body()))?json_decode($sub_cats->body())->subcategories:[];
                    if (count($sub_cats)){
                        $sub_cats = collect($sub_cats);
                        $current_sub_cat = $sub_cats->where('id','=',$sub_cat->id)->first();
                        $sub_category->translateOrNew($locale)->name = $current_sub_cat->name;
                    }
                }
                $sub_category->save();
            }
        }
        //get all cats
        $cats = Category::all();
        foreach ($cats as $cat){
            if ($cat->name == null){
                $cat->delete();
            }
        }
    }
}
