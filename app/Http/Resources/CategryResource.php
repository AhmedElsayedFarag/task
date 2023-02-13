<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'image' => (filter_var($this->image, FILTER_VALIDATE_URL) === true)?$this->image:asset($this->image),
            'name'=>$this->name,
            'children'=>$this::collection(Category::where('parent_id',$this->id)->get()),
//            'options'=>CategoryOptionResource::collection($this->category_options)
        ];
    }
}
