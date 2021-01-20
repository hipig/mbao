<?php

namespace App\Http\Requests\Admin;

use App\Models\Plan;
use Illuminate\Validation\Rule;

class PlanCreateRequest extends FormRequest
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
                Rule::unique('plans'),
            ],
            'price' => 'required|numeric|min:0',
            'period' => 'required|numeric',
            'interval' => [
                'required',
                Rule::in(array_keys(Plan::$intervalMap)),
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'key' => '标识',
            'price' => '价格',
            'period' => '时长',
            'interval' => '周期',
        ];
    }
}
