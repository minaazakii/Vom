<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\ErrorHelper;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        ErrorHelper::JsonFormat($validator);
    }

    public function rules(): array
    {
        return [
            'email'=>'required|email',
            'password'=>'required'
        ];
    }
}
