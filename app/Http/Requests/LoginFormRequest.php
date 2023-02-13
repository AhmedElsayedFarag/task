<?php

namespace App\Http\Requests;

use App\Traits\apiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginFormRequest extends FormRequest
{
    use apiResponseTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'exists:users,phone',
            'password' => 'required',
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
