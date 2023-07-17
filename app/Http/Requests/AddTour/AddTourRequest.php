<?php

namespace App\Http\Requests\AddTour;

use Illuminate\Foundation\Http\FormRequest;

class AddTourRequest extends FormRequest
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
           'cate_tour_id'=>'required',
            'tourname'=>'required',
            'location_t'=>'required',
            'location_url'=>'required',
            'img_lgtour'=>'required',
            'introduce_t'=>'required',
            'describe_t'=>'required',
            'tourplan'=>'required',
            'tour_date'=>'required',
            'price'=>'required'
        ];
    }
    public function messages()
    {
        return [
            
           
        ];
    }
   

}
