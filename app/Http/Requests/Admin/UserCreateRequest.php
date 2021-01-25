<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')
            ],
            'phone' => [
                'nullable',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
                Rule::unique('users')
            ],
            'email' => 'nullable|string|email|max:255',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '昵称',
            'email' => '电子邮箱',
            'password' => '密码',
        ];
    }
}
