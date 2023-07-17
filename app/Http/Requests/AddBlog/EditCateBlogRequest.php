<?php

namespace App\Http\Requests\AddBlog;

use Illuminate\Foundation\Http\FormRequest;

class EditCateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [

            'updm_blog_name' => 'required',
        ];
    }
    public function messages()
    {
        return [];
    }
}
