<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "email"=>"required|email:rfc,dns",
            "password"=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            "email.required"=>"Không bỏ trống :attribute",
            "password.required"=>"Không bỏ trống :attribute ",
        ];
    }
    public function attributes(): array
    {
        return [
            "email"=>"Email",
            "password"=>"Password"
        ];
    }
    public function prepareForValidation(): array
    {
        return [
            
        ];
    }
    
}