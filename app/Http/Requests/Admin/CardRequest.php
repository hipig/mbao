<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'group_id' => 'required',
            'name' => 'required',
            'name_en' => 'required',
            'color' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'group_id' => '分组',
            'name' => '名称',
            'name_en' => '英文名称',
            'color' => '颜色',
        ];
    }
}
