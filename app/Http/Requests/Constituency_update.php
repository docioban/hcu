<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Constituency_update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'constituency_name' => 'nullable|unique:constituencies,constituency_name',
            'voters' => 'nullable|numeric',
            'name_ro' => 'nullable|string',
            'name_ru' => 'nullable|string'
        ];
    }
}
