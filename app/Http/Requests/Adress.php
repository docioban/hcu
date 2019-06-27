<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Adress extends FormRequest
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
            'route' => 'nullable|string',
            'locality' => 'nullable|string',
            'administrative_area_level_1' => 'nullable|string'
        ];
    }
}
