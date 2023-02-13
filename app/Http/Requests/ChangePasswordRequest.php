<?php

namespace App\Http\Requests;

use App\Traits\apiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{
    use apiResponseTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return  [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = [];
        foreach ($validator->errors()->all() as $error){
            $errors[] = $error;
        }//end foreach
        throw new HttpResponseException($this->apiResponse(config('globals.error_code'),[],$errors));
    }
}
