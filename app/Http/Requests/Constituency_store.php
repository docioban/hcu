<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Constituency_store extends FormRequest
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
            'constituency_name' => 'required|unique:constituencies,constituency_name',
            'voters' => 'required|numeric',
            'name_ro' => 'required',
            'name_ru' => 'required'
        ];
    }
}
