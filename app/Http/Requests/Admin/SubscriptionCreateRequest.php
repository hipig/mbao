<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plan_id' => 'required',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'plan_id' => '方案',
            'user_id' => '用户',
        ];
    }
}
