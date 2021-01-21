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
            'name' => 'required|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')
            ],
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
