<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'array|required',
            'images.*' => 'required|image|file',
            'subsubcategory_id' => 'required'
        ];
    }
}
