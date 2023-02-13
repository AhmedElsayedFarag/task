<?php

namespace App\Http\Requests;

use App\Models\SocialUser;
use App\Models\User;
use App\Traits\apiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialLoginRequest extends FormRequest
{
    use apiResponseTrait;
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'social_id' => 'required',
            'social_type' => 'required',
//            'email' => 'email:rfc,dns|unique:users|required',
//            'password' => 'required|min:6',
//                'phone' => 'required|unique:users',
        ];
        $social_user = SocialUser::where('social_id',request()->social_id)->first();
        if ($social_user){
            $user = User::withTrashed()->findOrFail($social_user->user_id);
            $rules['email'] = 'email:rfc,dns|required';
        }else{
            $rules['email'] = 'email:rfc,dns|unique:users|required';
        }
            return $rules;

    }


    protected function failedValidation(Validator $validator) {
        $errors = [];
        foreach ($validator->errors()->all() as $error){
            $errors[] = $error;
        }//end foreach
        throw new HttpResponseException($this->apiResponse(config('globals.error_code'),[],$errors));
    }

}
