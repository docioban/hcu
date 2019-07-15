<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatePosts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'party_id' => 'required|integer',
            'constituency_id' => 'required|integer',
            'slug' => 'required',
            'location' => 'required',
            'civil_status' => 'required',
            'function' => 'required',
            'studies' => 'required',
            'date' => 'required',
            'cv' => 'file',
            'photo' => 'required|file|mimes:jpeg,png,jpg,bmp',
//            'type_*' => 'required|integer',
//            'title_*' => 'required',
//            'subtitle_*' => 'required',
//            'body_*' => 'required',
        ];
    }
}
