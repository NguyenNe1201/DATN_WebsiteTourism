<?php

namespace App\Http\Requests\PayMent;

use Illuminate\Foundation\Http\FormRequest;

class SignUpTourRequest extends FormRequest
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

            'tour_id' => 'required',
            'customer_id' => 'required',
            'Regis_date' => 'required',
            'num_people' => 'required',
            'total_price' => 'required',
            'status_payment' => 'required',

        ];
    }
    public function messages()
    {
        return [];
    }
}
