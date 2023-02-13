<?php

namespace App\Http\Resources;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryOptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $option = Option::find($this->option_id);
        return [
            'id'=>$option->id,
            'icon'=>asset($option->icon),
            'name'=>$option->name,
            'input_type'=>$option->input_type,
            'required'=>$this->required,
//            'values'=>OptionValueResource::collection(OptionValue::where('option_id',$option->id)->get())
        ];
    }
}
