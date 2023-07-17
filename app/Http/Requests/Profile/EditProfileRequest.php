<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'email'=>'required|email:filter|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'email.unique'=>'Email này đã tồn tại. Vui lòng nhập một Email khác!!! '
        ];  
    }
}
