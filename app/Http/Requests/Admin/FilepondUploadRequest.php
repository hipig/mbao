<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FilepondUploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = $this->type == 'file' ? '' : '|image';
        return [
            'filepond' => 'required' . $rule
        ];
    }
}
