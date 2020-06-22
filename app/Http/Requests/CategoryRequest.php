<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
        'category_name' => ['required','max:20','unique:categories','regex:/^[A-Za-z0-9.,\\-\'\#_\s]+$/i'],
        'category_title' => ['required','max:200','regex:/^[A-Za-z0-9.,\\-\'\#_\s]+$/i'],
       'description' => 'required|max:1000',
       'category_type' => 'required',
       'photo' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
    ];
    }

    public function messages()
    {
        return [
            'description.max' => 'Maximum 1000 characters allowed',
        ];
    }
}
