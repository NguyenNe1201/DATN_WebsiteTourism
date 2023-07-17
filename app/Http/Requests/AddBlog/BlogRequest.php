<?php

namespace App\Http\Requests\AddBlog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
           
            'category_id'=>'required',
            'title'=>'required',
            'img_title'=>'required',
            'content_blog'=>'required',

            //  'img_title_1'=>'required',
            //  'img_title_2'=>'required',
     
            

        ];
    }
    public function messages()
    {
        return [
            
           
        ];
    }
   

}
