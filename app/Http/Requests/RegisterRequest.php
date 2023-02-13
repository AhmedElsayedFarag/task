<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Traits\apiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    use apiResponseTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //our 3 roles
        //1- if phone not verified and user want to register with it => delete old account
        //2- if email is taken but the user is soft deleted          => delete old account
        //3- if phone is taken but the user is soft deleted          => delete old account
        if ($this->has('phone')){
            $user = User::withTrashed()->where(function($query){
                $query->where('phone',$this->phone)
                    ->Where('phone_verified_at',null);
            })->orWhere(function($query){
                $query->where('phone',$this->phone)
                    ->Where('deleted_at','!=',null);
            })->first();
            if ($user){
                $user->forceDelete();
            }
        }

        if ($this->has('email')){
            $user = User::withTrashed()->where([
                ['email', $this->email], ['deleted_at','!=',null]
            ])->first();
            if ($user){
                $user->forceDelete();
            }
        }

        return  [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email:rfc,dns|unique:users|required',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|unique:users',
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
