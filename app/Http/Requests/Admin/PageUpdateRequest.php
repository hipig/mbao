<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'key' => [
                'required',
                Rule::unique('pages')->ignore($this->route('page')),
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'key' => '标识',
        ];
    }
}
