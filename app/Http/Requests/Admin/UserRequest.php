<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'first_name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'email'=>'required|email|max:100|unique:users,email,'.@$this->user,
            'phone'=>'required|string|max:30|unique:users,phone,'.@$this->user,
            'role'=>'nullable|string|max:30',
            'password'=>'nullable|string|min:6',
        ];
    }
}
