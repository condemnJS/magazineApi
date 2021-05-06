<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSubCategoryRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'subcategory_id' => 'required',
            'image' => 'required|file|mimes:png'
        ];
    }
}
