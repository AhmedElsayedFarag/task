<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\OptionValue;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'icon'=>asset($this->icon),
            'name'=>$this->name,
            'values'=>OptionValueResource::collection(OptionValue::where('option_id',$this->id)->get())
        ];
    }
}
