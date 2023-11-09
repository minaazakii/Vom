<?php

namespace App\Http\Requests\Api\Store;

use App\Helpers\ErrorHelper;
use Illuminate\Foundation\Http\FormRequest;

class StorestoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'name'=>'required',
            'user_id'=>'required|exists:users,id'
        ];
    }
}
