<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'ad_id'=>'required|exists:ads,id',
            'image'=>'required|image|mimes:jpg,jpeg,png,bmp,tiff|max:4096'
        ];
    }
}
