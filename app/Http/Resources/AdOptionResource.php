<?php

namespace App\Http\Resources;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Http\Resources\Json\JsonResource;

class AdOptionResource extends JsonResource
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
            'option'=>Option::find($this->option_id)->name,
            'option_id'=>$this->option_id,
            'option_icon'=>(Option::find($this->option_id)->icon)?asset(Option::find($this->option_id)->icon):null,
            'value'=>(OptionValue::find($this->option_value))?OptionValue::find($this->option_value)->name:$this->option_value,
            'value_id'=>(OptionValue::find($this->option_value))?OptionValue::find($this->option_value)->id:null,
            'value_icon'=>(OptionValue::find($this->option_value))?asset(OptionValue::find($this->option_value)->icon):null,
        ];
    }
}
